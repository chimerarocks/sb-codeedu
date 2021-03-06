<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignReport;

use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignReportInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CampaignReportPageAction
{
    private $repository;

    private $report;

    public function __construct(
        CampaignRepositoryInterface         $repository,
        CampaignReportInterface             $report
    )
    {
        $this->repository   = $repository;
        $this->report       = $report;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        $this->report->setCampaign($entity);
        return $this->report->render();
    }
}
