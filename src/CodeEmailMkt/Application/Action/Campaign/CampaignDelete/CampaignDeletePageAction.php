<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignDelete;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Application\Form\HttpMethodElement;
use CodeEmailMkt\Domain\Entity\Campaign;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CampaignDeletePageAction
{
    private $repository;
    private $template;
    private $router;
    private $form;

    public function __construct(
        CampaignRepositoryInterface             $repository, 
        Template\TemplateRendererInterface      $template,
        RouterInterface                         $router,
        CampaignForm                            $form
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
            $flash->setMessage(FlashMessageInterface::SUCCESS_MESSAGE, 'Contato removido com sucesso');
            
            return new RedirectResponse(
                $this->router->generateUri('admin.campaigns.list')
            );
        }
        return new HtmlResponse($this->template->render('app::campaigns/delete', [
            'form' => $this->form
        ]));
    }
}
