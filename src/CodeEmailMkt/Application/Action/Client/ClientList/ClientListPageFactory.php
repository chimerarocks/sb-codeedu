<?php

namespace CodeEmailMkt\Application\Action\Client\ClientList;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClientListPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(ClientRepositoryInterface::class);

        return new ClientListPageAction($repository, $template);
    }
}
