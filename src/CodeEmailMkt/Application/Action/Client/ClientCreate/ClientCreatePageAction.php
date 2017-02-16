<?php

namespace CodeEmailMkt\Application\Action\Client\ClientCreate;

use CodeEmailMkt\Domain\Entity\Client;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class ClientCreatePageAction
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
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $entity = new Client();
            $entity
                ->setName($data['name'])
                ->setEmail($data['email'])
                ->setCpf($data['cpf'])
                ;
            $this->repository->create($entity);
        }
        return new HtmlResponse($this->template->render('app::clients/create'));
    }
}
