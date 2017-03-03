<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignCreate;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignCreatePageFactory
{
    public function __invoke(ContainerInterface $container): CampaignCreatePageAction
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(CampaignRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form 		= $container->get(CampaignForm::class);

        return new CampaignCreatePageAction($repository, $template, $router, $form);
    }
}