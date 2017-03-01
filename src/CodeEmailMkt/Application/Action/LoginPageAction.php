<?php

namespace CodeEmailMkt\Application\Action;

use CodeEmailMkt\Application\Form\LoginForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Twig\TwigRenderer;

class LoginPageAction
{
    private $router;
    private $template;
    private $form;

    public function __construct(
        Router\RouterInterface $router, 
        Template\TemplateRendererInterface $template = null, 
        LoginForm $form
    )
    {
        $this->router   = $router;
        $this->template = $template;
        $this->form = $form;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        return new HtmlResponse($this->template->render('app::login', [
            'form' => $this->form
        ]));
    }
}
