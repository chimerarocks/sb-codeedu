<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignReport;

use CodeEmailMkt\Application\Action\Campaign\CampaignReport\CampaignReportPageAction;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignReportInterface;
use Interop\Container\ContainerInterface;

class CampaignSenderPageFactory
{
    public function __invoke(ContainerInterface $container): CampaignReportPageAction
    {
        $repository = $container->get(CampaignRepositoryInterface::class);
        $report     = $container->get(CampaignReportInterface::class);

        return new CampaignReportPageAction($repository, $report);
    }
}