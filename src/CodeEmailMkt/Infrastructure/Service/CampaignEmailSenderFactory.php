<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Infrastructure\Service\CampaignEmailSender;
use Interop\Container\ContainerInterface;
use Mailgun\Mailgun;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignEmailSenderFactory
{
	public function __invoke(ContainerInterface $container): CampaignEmailSender
	{
		$templateRenderer = $container->get(TemplateRendererInterface::class);
		$mailgun 		  = $container->get(Mailgun::class);
		$mailGunConfig	  = $container->get('config')['mailgun'];
		return new CampaignEmailSender($templateRenderer, $mailgun, $mailGunConfig);
	}
}