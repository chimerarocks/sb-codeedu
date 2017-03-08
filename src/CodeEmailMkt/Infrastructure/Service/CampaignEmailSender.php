<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Service\CampaignEmailSenderInterface;

class CampaignEmailSender implements CampaignEmailSenderInterface 
{
	public function send()
	{
		throw new \Exception('Method not implemented');
	}

	public function setCampaign(Campaign $campaign)
	{
		throw new \Exception('Method not implemented');
	}
}