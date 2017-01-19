<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            CodeEmailMkt\Application\Action\PingAction::class => CodeEmailMkt\Application\Action\PingAction::class,
        ],
        'factories' => [
            CodeEmailMkt\Application\Action\HomePageAction::class =>
                CodeEmailMkt\Application\Action\HomePageFactory::class,
            CodeEmailMkt\Application\Action\Client\ClientList\ClientListPageAction::class =>
                CodeEmailMkt\Application\Action\Client\ClientList\ClientListPageFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => CodeEmailMkt\Application\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => CodeEmailMkt\Application\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'admin.clients.list',
            'path' => '/admin/clientes',
            'middleware' => CodeEmailMkt\Application\Action\Client\ClientList\ClientListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
