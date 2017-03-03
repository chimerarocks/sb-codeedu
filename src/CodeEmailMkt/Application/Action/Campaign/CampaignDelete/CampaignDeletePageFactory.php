<?php

namespace CodeEmailMkt\Application\Action\Campaign\CampaignDelete;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CampaignDeletePageFactory
{
    public function __invoke(ContainerInterface $container): CampaignDeletePageAction
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(CampaignRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form       = $container->get(CampaignForm::class);

        return new CampaignDeletePageAction($repository, $template, $router, $form);
    }
}