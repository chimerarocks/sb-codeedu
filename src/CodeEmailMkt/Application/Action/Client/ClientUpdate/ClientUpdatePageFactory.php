<?php

namespace CodeEmailMkt\Application\Action\Client\ClientUpdate;

use CodeEmailMkt\Application\Form\ClientForm;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClientUpdatePageFactory
{
    public function __invoke(ContainerInterface $container): ClientUpdatePageAction
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(ClientRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form 		= $container->get(ClientForm::class);

        return new ClientUpdatePageAction($repository, $template, $router, $form);
    }
}