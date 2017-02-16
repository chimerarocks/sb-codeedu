<?php

use CodeEmailMkt\Application\Action\Client;

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            CodeEmailMkt\Application\Action\PingAction::class => CodeEmailMkt\Application\Action\PingAction::class,
        ],
        'factories' => [
            CodeEmailMkt\Application\Action\HomePageAction::class =>
                CodeEmailMkt\Application\Action\HomePageFactory::class,
            Client\ClientList\ClientListPageAction::class =>
                Client\ClientList\ClientListPageFactory::class,
            Client\ClientCreate\ClientCreatePageAction::class =>
                Client\ClientCreate\ClientCreatePageFactory::class,
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
        [
            'name' => 'admin.clients.new',
            'path' => '/admin/clientes/novo',
            'middleware' => CodeEmailMkt\Application\Action\Client\ClientCreate\ClientCreatePageAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
