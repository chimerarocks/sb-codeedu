<?php

namespace CodeEmailMkt\Application\Action;

use CodeEmailMkt\Application\Form\LoginForm;
use CodeEmailMkt\Domain\Service\AuthServiceInterface;
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
    private $authService;

    public function __construct(
        Router\RouterInterface              $router, 
        Template\TemplateRendererInterface  $template = null, 
        LoginForm                           $form,
        AuthServiceInterface                $authService
    )
    {
        $this->router       = $router;
        $this->template     = $template;
        $this->form         = $form;
        $this->authService  = $authService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                $user = $this->form->getData();
                if ($this->authService->authenticate($user['email'], $user['password'])) {
                    return new RedirectResponse(
                        $this->router->generateUri('admin.clients.list')
                    );
                }
            }
        }


        return new HtmlResponse($this->template->render('app::login', [
            'form' => $this->form
        ]));
    }
}
