<?php

namespace CodeEmailMkt\Application\Action\Tag\TagList;

use CodeEmailMkt\Domain\Repository\Criteria\FindByNameCriteriaInterface;
use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TagListPageFactory
{
    public function __invoke(ContainerInterface $container): TagListPageAction
    {
        $template 			= $container->get(TemplateRendererInterface::class);
        $repository 		= $container->get(TagRepositoryInterface::class);

        return new TagListPageAction($repository, $template);
    }
}