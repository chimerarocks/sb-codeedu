<?php

namespace CodeEmailMkt\Application\Action\Client\ClientCreate;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClientCreatePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(ClientRepositoryInterface::class);

        return new ClientCreatePageAction($repository, $template);
    }
}