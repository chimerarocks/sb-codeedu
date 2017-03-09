<?php

namespace CodeEmailMkt\Domain\Service;

use CodeEmailMkt\Domain\Entity\Campaign;
use Psr\Http\Message\ResponseInterface;

interface CampaignReportInterface
{
	public function setCampaign(Campaign $campaign);

	public function render(): ResponseInterface;
}