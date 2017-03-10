<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Entity\Campaign;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignReportInterface;
use Mailgun\Connection\Exceptions\MissingEndpoint;
use Mailgun\Mailgun;
use Mailgun\Messages\BatchMessage;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignReport implements CampaignReportInterface
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

	public function setCampaign(Campaign $campaign)
	{
		$this->campaign = $campaign;
		return $this;
	}

	public function render(): ResponseInterface
	{
		return new HtmlResponse($this->templateRenderer->render('app::campaign/report', [
			'campaign_data' 	=> $this->getCampaignData(),
			'campaign'			=> $this->campaign,
			'clients_count' 	=> $this->getCountClients(),
			'opened_distinct_counts' => $this->getCountOpenedDistinct()
		]));
	}

	protected function getCampaignData()
	{
		$domain = $this->mailGunConfig['domain'];
		$response = $this->mailGun->get("$domain/campaigns/campaign_{$this->campaign->getId()}");
		return $response->http_response_body;
	}

	protected function getCountOpenedDistinct()
	{
		$domain = $this->mailGunConfig['domain'];
		$response = $this->mailGun->get("$domain/campaigns/campaign_{$this->campaign->getId()}/opens", [
			'group_by' 	=> 'recipient',
			'count'		=> true
		]);
		return $response->http_response_body->count;
	}

	protected function getCountClients()
	{
		$tags = $this->campaign->getTags()->toArray();
		$clients = $this->clientRepository->findByTags($tags);
		return count($clients);
	}
}