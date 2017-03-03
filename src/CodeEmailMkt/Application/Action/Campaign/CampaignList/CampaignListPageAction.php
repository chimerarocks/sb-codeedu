<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignList;

use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Mailgun\Mailgun;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class CampaignListPageAction
{
    private $repository;

    private $template;

    private $mailgun;

    public function __construct(
        CampaignRepositoryInterface $repository, 
        Template\TemplateRendererInterface $template = null,
        Mailgun $mailgun
    )
    {
        $this->repository = $repository;
        $this->template = $template;
        $this->mailgun = $mailgun;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $campaigns = $this->repository->findAll();

        $flash = $request->getAttribute('flash');
        
        return new HtmlResponse($this->template->render('app::campaigns/list', [
            'campaigns' => $campaigns,
            'message' => $flash->getMessage(FlashMessageInterface::SUCCESS_MESSAGE)
        ]));
    }
}
