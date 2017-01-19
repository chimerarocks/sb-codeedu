<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            CodeEmailMkt\Action\PingAction::class => CodeEmailMkt\Action\PingAction::class,
        ],
        'factories' => [
            CodeEmailMkt\Action\HomePageAction::class => CodeEmailMkt\Action\HomePageFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => CodeEmailMkt\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => CodeEmailMkt\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
