<?php

namespace CodeEmailMkt\Application\Action\Tag\TagUpdate;

use CodeEmailMkt\Application\Form\TagForm;
use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TagUpdatePageFactory
{
    public function __invoke(ContainerInterface $container): TagUpdatePageAction
    {
        $template   = $container->get(TemplateRendererInterface::class);
        $repository = $container->get(TagRepositoryInterface::class);
        $router     = $container->get(RouterInterface::class);
        $form 		= $container->get(TagForm::class);

        return new TagUpdatePageAction($repository, $template, $router, $form);
    }
}