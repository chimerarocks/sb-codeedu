<?php

namespace CodeEmailMkt\Application\Action\Client\ClientList;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class ClientListPageAction
{
    private $repository;

    private $template;

    public function __construct(ClientRepositoryInterface $repository, Template\TemplateRendererInterface $template = null)
    {
        $this->repository = $repository;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $clients = $this->repository->findAll();

        $flash = $request->getAttribute('flash');
        
        return new HtmlResponse($this->template->render('app::clients/list', [
            'clients' => $clients,
            'message' => $flash->getMessage('success')
        ]));
    }
}
