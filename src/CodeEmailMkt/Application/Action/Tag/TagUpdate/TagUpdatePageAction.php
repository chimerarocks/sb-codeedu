<?php

namespace CodeEmailMkt\Application\Action\Tag\TagUpdate;

use CodeEmailMkt\Application\Form\TagForm;
use CodeEmailMkt\Application\Form\HttpMethodElement;
use CodeEmailMkt\Domain\Entity\Tag;
use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class TagUpdatePageAction
{
    private $repository;
    private $template;
    private $router;
    private $form;

    public function __construct(
        TagRepositoryInterface           $repository, 
        Template\TemplateRendererInterface  $template,
        RouterInterface                     $router,
        TagForm                          $form
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
                $flash->setMessage(FlashMessageInterface::SUCCESS_MESSAGE, 'Contato atualizado com sucesso');
                
                return new RedirectResponse(
                    $this->router->generateUri('admin.tags.list')
                );
            }
        }
        return new HtmlResponse($this->template->render('app::tags/update', [
            'form' => $this->form
        ]));
    }
}
