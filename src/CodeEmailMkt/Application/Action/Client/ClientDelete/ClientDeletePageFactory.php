<?php

namespace CodeEmailMkt\Application\Action\Client\ClientDelete;

use CodeEmailMkt\Application\Form\ClientForm;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClientDeletePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(ClientRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form       = $container->get(ClientForm::class);

        return new ClientDeletePageAction($repository, $template, $router, $form);
    }
}