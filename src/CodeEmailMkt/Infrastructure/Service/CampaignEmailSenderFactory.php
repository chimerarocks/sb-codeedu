<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Infrastructure\Service\CampaignEmailSender;
use Interop\Container\ContainerInterface;

class CampaignEmailSenderFactory
{
	public function __invoke(ContainerInterface $container): CampaignEmailSender
	{
		return new CampaignEmailSender();
	}
}