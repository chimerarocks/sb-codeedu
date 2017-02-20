<?php

namespace CodeEmailMkt\Application\Action\Client\ClientUpdate;

use CodeEmailMkt\Domain\Entity\Client;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class ClientUpdatePageAction
{
    private $repository;

    private $template;
    private $router;

    public function __construct(
        ClientRepositoryInterface $repository, 
        Template\TemplateRendererInterface $template,
        RouterInterface $router
        )
    {
        $this->repository = $repository;
        $this->template = $template;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $client = $this->repository->find($id);
        if ($request->getMethod() == 'PUT') {
            $flash = $request->getAttribute('flash');
            $data = $request->getParsedBody();
            $client
                ->setName($data['name'])
                ->setEmail($data['email'])
                ->setCpf($data['cpf'])
                ;
            $this->repository->update($client);
            $flash->setMessage('success', 'Contato cadastrado com sucesso');

            $uri = $this->router->generateUri('admin.clients.list');
            return new RedirectResponse($uri);

        }
        return new HtmlResponse($this->template->render('app::clients/update', ['client' => $client]));
    }
}
