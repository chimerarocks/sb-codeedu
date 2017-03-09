<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use CodeEmailMkt\Infrastructure\Service\CampaignReport;
use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignReportFactory
{
	public function __invoke(ContainerInterface $container): CampaignReport
	{
		$templateRenderer = $container->get(TemplateRendererInterface::class);
		$mailgun 		  = $container->get(Mailgun::class);
		$mailGunConfig	  = $container->get('config')['mailgun'];
		$repository       = $container->get(ClientRepositoryInterface::class);
		return new CampaignReport($templateRenderer, $mailgun, $mailGunConfig, $repository);
	}
}