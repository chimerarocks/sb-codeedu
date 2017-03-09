<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignReportInterface;
use Mailgun\Connection\Exceptions\MissingEndpoint;
use Mailgun\Mailgun;
use Mailgun\Messages\BatchMessage;
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

	public function setCampaign(Campaign $campaign): CampaignReport
	{
		$this->campaign = $campaign;
		return $this;
	}

	public function render(): ResponseInterface
	{
		$this->getCampaignData();
	}

	protected function getCampaignData()
	{
		$domain = $this->mailGunConfig['domain'];

	}
}