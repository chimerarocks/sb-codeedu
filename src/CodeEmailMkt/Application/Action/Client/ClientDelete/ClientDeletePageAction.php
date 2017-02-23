<?php

namespace CodeEmailMkt\Application\Action\Client\ClientDelete;

use CodeEmailMkt\Application\Form\ClientForm;
use CodeEmailMkt\Application\Form\HttpMethodElement;
use CodeEmailMkt\Domain\Entity\Client;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class ClientDeletePageAction
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
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        $this->form->add(new HttpMethodElement('DELETE'));
        $this->form->bind($entity);
        if (strtoupper($request->getMethod()) == 'DELETE') {
            $flash = $request->getAttribute('flash');
            $this->repository->remove($entity);
            $flash->setMessage('success', 'Contato removido com sucesso');
            
            return new RedirectResponse(
                $this->router->generateUri('admin.clients.list')
            );
        }
        return new HtmlResponse($this->template->render('app::clients/delete', [
            'form' => $this->form
        ]));
    }
}
