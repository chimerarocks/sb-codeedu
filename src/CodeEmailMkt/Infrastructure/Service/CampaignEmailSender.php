<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Service;

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

	public function __construct(
		TemplateRendererInterface $templateRenderer, 
		Mailgun $mailGun, 
		array $mailGunConfig
	)
	{

		$this->templateRenderer = $templateRenderer;
		$this->mailGun = $mailGun;
		$this->mailGunConfig = $mailGunConfig;
	}

	public function send()
	{
		$tags = $this->campaign->getTags()->toArray();
		foreach ($tags as $tag) {
			$customers = $tag->getCustomers()->toArray();
			foreach ($customers) {
				# code...
			}
		}
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
		$this->templateRenderer->render('app:campaign/_campaign_template', [
			'content' => $template
		]);
	}
}