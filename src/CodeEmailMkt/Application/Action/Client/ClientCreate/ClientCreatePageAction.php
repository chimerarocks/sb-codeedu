<?php

namespace CodeEmailMkt\Application\Action\Client\ClientCreate;

use CodeEmailMkt\Application\Form\ClientForm;
use CodeEmailMkt\Domain\Entity\Client;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class ClientCreatePageAction
{
    private $repository;
    private $template;
    private $router;
    private $form;

    public function __construct(
        ClientRepositoryInterface           $repository, 
        Template\TemplateRendererInterface  $template,
        RouterInterface                     $router,
        ClientForm                          $form
        )
    {
        $this->repository   = $repository;
        $this->template     = $template;
        $this->router       = $router;
        $this->form         = $form;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if (strtoupper($request->getMethod()) == 'POST') {

            $data = $request->getParsedBody();
            $this->form->setData($data);

            if ($this->form->isValid()) {
                $entity = $this->form->getData();
                $flash = $request->getAttribute('flash');
                $this->repository->create($entity);
                $flash->setMessage(FlashMessageInterface::SUCCESS_MESSAGE, 'Contato cadastrado com sucesso');

                $uri = $this->router->generateUri('admin.clients.list');
                return new RedirectResponse($uri);
            }

        }
        return new HtmlResponse($this->template->render('app::clients/create', [
            'form' => $this->form
        ]));
    }
}
