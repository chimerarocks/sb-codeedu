<?php

namespace CodeEmailMkt\Application\Action\Tag\TagList;

use CodeEmailMkt\Domain\Repository\Criteria\FindByNameCriteriaInterface;
use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use CodeEmailMkt\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class TagListPageAction
{
    private $repository;

    private $template;

    public function __construct(
        TagRepositoryInterface $repository, 
        Template\TemplateRendererInterface $template = null
    )
    {
        $this->repository = $repository;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $tags = $this->repository->findAll();

        $flash = $request->getAttribute('flash');
        
        return new HtmlResponse($this->template->render('app::tags/list', [
            'tags' => $tags,
            'message' => $flash->getMessage(FlashMessageInterface::SUCCESS_MESSAGE)
        ]));
    }
}
