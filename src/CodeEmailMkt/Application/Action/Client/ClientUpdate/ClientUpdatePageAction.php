<?php

namespace CodeEmailMkt\Application\Action\Client\ClientUpdate;

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

class ClientUpdatePageAction
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
        
        $this->form->add(new HttpMethodElement('PUT'));
        $this->form->bind($entity);

        if ($request->getMethod() == 'PUT') {
            $dataRow = $request->getParsedBody();
            $this->form->setData($dataRow);
            if ($this->form->isValid()) {
                $flash = $request->getAttribute('flash');
                $entity = $this->form->getData();
                $this->repository->update($entity);
                $flash = $request->getAttribute('flash');
                $flash->setMessage('success', 'Contato atualizado com sucesso');
                
                return new RedirectResponse(
                    $this->router->generateUri('admin.clients.list')
                );
            }
        }
        return new HtmlResponse($this->template->render('app::clients/update', [
            'form' => $this->form
        ]));
    }
}
