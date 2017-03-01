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
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                // $user = $this->form->getData();
                // if ($this->auth->authenticate($user['email'], $user['password'])) {
                //     return new RedirectResponse(
                //         $this->router->generateUri('customer.list')
                //     );
                // }
            }
        }


        return new HtmlResponse($this->template->render('app::login', [
            'form' => $this->form
        ]));
    }
}
