<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignSender;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Domain\Entity\Campaign;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignEmailSenderInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CampaignSenderPageAction
{
    private $repository;
    private $template;
    private $router;
    private $form;
    private $emailSender;

    public function __construct(
        CampaignRepositoryInterface         $repository,
        Template\TemplateRendererInterface  $template,
        RouterInterface                     $router,
        CampaignForm                        $form,
        CampaignEmailSenderInterface        $emailSender,
        )
    {
        $this->repository   = $repository;
        $this->template     = $template;
        $this->router       = $router;
        $this->form         = $form;
        $this->emailSender = $emailSender;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute('id');
        $entity = $this->repository->find($id);
        $this->form->bind($entity);
        if ($request->getMethod() == 'POST') {
            $this->emailSender->setCampaign($entity);
            $this->emailSender->send();
            $flash = $request->getAttribute('flash');
            $flash->setMessage(FlashMessageInterface::SUCCESS_MESSAGE, 'Campanha enviada com sucesso');
            
            return new RedirectResponse(
                $this->router->generateUri('admin.campaigns.list')
            );
        }
        return new HtmlResponse($this->template->render('app::campaigns/sender', [
            'form' => $this->form
        ]));
    }
}
