<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignEmailSenderInterface;
use Mailgun\Mailgun;
use Mailgun\Messages\BatchMessage;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignEmailSender implements CampaignEmailSenderInterface 
{
	private $campaign;
	private $templateRenderer;
	private $mailGun;
	private $mailGunConfig;
	private $clientRepository;

	public function __construct(
		TemplateRendererInterface $templateRenderer, 
		Mailgun $mailGun, 
		array $mailGunConfig,
		ClientRepositoryInterface $clientRepository
	)
	{

		$this->templateRenderer = $templateRenderer;
		$this->mailGun = $mailGun;
		$this->mailGunConfig = $mailGunConfig;
		$this->clientRepository = $clientRepository;
	}

	public function send()
	{
		$batchMessage = $this->getBatchMessage();
		$tags = $this->campaign->getTags()->toArray();
		
		foreach ($tags as $tag) {
			$batchMessage->addTag($tag->getName());
			
		}
		
		$clients = $this->clientRepository->findByTags($tags);

		foreach ($clients as $client) {
			$name = (!$client->getName() or $client->getName() == '') 
				? $client->getEmail() : $client->getName();
			$batchMessage->addToRecipient($client->getEmail(), [
				'full_name' => $name
			]);
		}
		$batchMessage->finalize();
	}

	public function setCampaign(Campaign $campaign): CampaignEmailSender
	{
		$this->campaign = $campaign;
		return $this;
	}

	protected function getBatchMessage(): BatchMessage
	{
		$batchMessage = $this->mailGun->BatchMessage($this->mailGunConfig['domain']);
		$batchMessage->addCampaignId("campaign_{$this->campaign->getId()}");
		$batchMessage->setFromAddress('joaopedrodslv@gmail.com', ['full_name' => 'João Pedro']);
		$batchMessage->setSubject($this->campaign->getSubject());
		$batchMessage->setHtmlBody($this->getHtmlBody());
		return $batchMessage;
	}

	protected function getHtmlBody(): string
	{
		$template = $this->campaign->getTemplate();
		$this->templateRenderer->render('app::campaigns/_campaign_template', [
			'content' => $template
		]);
	}
}