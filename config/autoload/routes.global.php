<?php

use Zend\Expressive\Router\{
    RouterInterface, 
    AuraRouter
};

use CodeEmailMkt\Application\Action\Client\{
    ClientList\ClientListPageAction,
    ClientList\ClientListPageFactory,
    ClientCreate\ClientCreatePageAction,
    ClientCreate\ClientCreatePageFactory,
    ClientUpdate\ClientUpdatePageAction,
    ClientUpdate\ClientUpdatePageFactory,
    ClientDelete\ClientDeletePageAction,
    ClientDelete\ClientDeletePageFactory
};
use CodeEmailMkt\Application\Action\{
    LoginPageAction,
    LoginPageFactory,
    LogoutAction,
    LogoutFactory
};

return [
    'dependencies' => [
        'invokables' => [
            RouterInterface::class  => AuraRouter::class,
        ],
        'factories' => [
            ClientListPageAction::class     => ClientListPageFactory::class,
            ClientCreatePageAction::class   => ClientCreatePageFactory::class,
            ClientUpdatePageAction::class   => ClientUpdatePageFactory::class,
            ClientDeletePageAction::class   => ClientDeletePageFactory::class,
            LoginPageAction::class          => LoginPageFactory::class,
            LogoutAction::class             => LogoutFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => ClientListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'auth.login',
            'path' => '/auth/login',
            'middleware' => LoginPageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'auth.logout',
            'path' => '/auth/logout',
            'middleware' => LogoutAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'admin.clients.list',
            'path' => '/admin/clientes',
            'middleware' => ClientListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'admin.clients.create',
            'path' => '/admin/clientes/novo',
            'middleware' => ClientCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'admin.clients.update',
            'path' => '/admin/clientes/editar/{id}',
            'middleware' => ClientUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.clients.delete',
            'path' => '/admin/clientes/excluir/{id}',
            'middleware' => ClientDeletePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'id' => '\d+'
            ]
        ]
    ],
];
