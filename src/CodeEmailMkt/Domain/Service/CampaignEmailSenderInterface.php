<?php

namespace CodeEmailMkt\Domain\Service;

use CodeEmailMkt\Domain\Entity\Campaign;
use CodeEmailMkt\Domain\Service\EmailServiceInterface;

interface CampaignEmailSenderInterface extends EmailServiceInterface
{
	public function setCampaign(Campaign $campaign);
}