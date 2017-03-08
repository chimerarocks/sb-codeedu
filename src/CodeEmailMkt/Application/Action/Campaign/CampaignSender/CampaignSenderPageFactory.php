<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignSender;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use CodeEmailMkt\Domain\Service\CampaignEmailSenderInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignSenderPageFactory
{
    public function __invoke(ContainerInterface $container): CampaignSenderPageAction
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(CampaignRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form 		= $container->get(CampaignForm::class);
        $emailSender= $container->get(CampaignEmailSenderInterface::class);

        return new CampaignSenderPageAction($repository, $template, $router, $form, $emailSender);
    }
}