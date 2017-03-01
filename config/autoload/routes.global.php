<?php

use CodeEmailMkt\Application\Action\Client;
use CodeEmailMkt\Application\Action;

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
            Client\ClientUpdate\ClientUpdatePageAction::class =>
                Client\ClientUpdate\ClientUpdatePageFactory::class,
            Client\ClientDelete\ClientDeletePageAction::class =>
                Client\ClientDelete\ClientDeletePageFactory::class,
            Action\LoginPageAction::class =>
                Action\LoginPageFactory::class,
            Action\LogoutAction::class =>
                Action\LogoutFactory::class,
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
            'name' => 'auth.login',
            'path' => '/auth/login',
            'middleware' => CodeEmailMkt\Application\Action\LoginPageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'auth.logout',
            'path' => '/auth/logout',
            'middleware' => CodeEmailMkt\Application\Action\LogoutAction::class,
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
            'name' => 'admin.clients.create',
            'path' => '/admin/clientes/novo',
            'middleware' => CodeEmailMkt\Application\Action\Client\ClientCreate\ClientCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'admin.clients.update',
            'path' => '/admin/clientes/editar/{id}',
            'middleware' => CodeEmailMkt\Application\Action\Client\ClientUpdate\ClientUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.clients.delete',
            'path' => '/admin/clientes/excluir/{id}',
            'middleware' => CodeEmailMkt\Application\Action\Client\ClientDelete\ClientDeletePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'id' => '\d+'
            ]
        ]
    ],
];
