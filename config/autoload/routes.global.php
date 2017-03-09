<?php

use Zend\Diactoros\Response\RedirectResponse;

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

use CodeEmailMkt\Application\Action\Tag\{
    TagList\TagListPageAction,
    TagList\TagListPageFactory,
    TagCreate\TagCreatePageAction,
    TagCreate\TagCreatePageFactory,
    TagUpdate\TagUpdatePageAction,
    TagUpdate\TagUpdatePageFactory,
    TagDelete\TagDeletePageAction,
    TagDelete\TagDeletePageFactory
};

use CodeEmailMkt\Application\Action\Campaign\{
    CampaignList\CampaignListPageAction,
    CampaignList\CampaignListPageFactory,
    CampaignCreate\CampaignCreatePageAction,
    CampaignCreate\CampaignCreatePageFactory,
    CampaignUpdate\CampaignUpdatePageAction,
    CampaignUpdate\CampaignUpdatePageFactory,
    CampaignDelete\CampaignDeletePageAction,
    CampaignDelete\CampaignDeletePageFactory,
    CampaignSender\CampaignSenderPageAction,
    CampaignSender\CampaignSenderPageFactory,
    CampaignReport\CampaignReportPageAction,
    CampaignReport\CampaignReportPageFactory
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
            TagListPageAction::class        => TagListPageFactory::class,
            TagCreatePageAction::class      => TagCreatePageFactory::class,
            TagUpdatePageAction::class      => TagUpdatePageFactory::class,
            TagDeletePageAction::class      => TagDeletePageFactory::class,
            CampaignListPageAction::class   => CampaignListPageFactory::class,
            CampaignCreatePageAction::class => CampaignCreatePageFactory::class,
            CampaignUpdatePageAction::class => CampaignUpdatePageFactory::class,
            CampaignDeletePageAction::class => CampaignDeletePageFactory::class,
            CampaignSenderPageAction::class => CampaignSenderPageFactory::class,
            CampaignReportPageAction::class => CampaignReportPageFactory::class,
            LoginPageAction::class          => LoginPageFactory::class,
            LogoutAction::class             => LogoutFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => function() {
                return new RedirectResponse('/admin/clientes');
            },
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
        ],
        [
            'name' => 'admin.tags.list',
            'path' => '/admin/tags',
            'middleware' => TagListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'admin.tags.create',
            'path' => '/admin/tags/novo',
            'middleware' => TagCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'admin.tags.update',
            'path' => '/admin/tags/editar/{id}',
            'middleware' => TagUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.tags.delete',
            'path' => '/admin/tags/excluir/{id}',
            'middleware' => TagDeletePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.campaigns.list',
            'path' => '/admin/campanhas',
            'middleware' => CampaignListPageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'admin.campaigns.create',
            'path' => '/admin/campanhas/novo',
            'middleware' => CampaignCreatePageAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'admin.campaigns.update',
            'path' => '/admin/campanhas/editar/{id}',
            'middleware' => CampaignUpdatePageAction::class,
            'allowed_methods' => ['GET', 'PUT'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.campaigns.delete',
            'path' => '/admin/campanhas/excluir/{id}',
            'middleware' => CampaignDeletePageAction::class,
            'allowed_methods' => ['GET', 'DELETE'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.campaigns.sender',
            'path' => '/admin/campanhas/enviar/{id}',
            'middleware' => CampaignSenderPageAction::class,
            'allowed_methods' => ['POST', 'GET'],
            'options' => [
                'id' => '\d+'
            ]
        ],
        [
            'name' => 'admin.campaigns.report',
            'path' => '/admin/campanhas/relatorio/{id}',
            'middleware' => CampaignReportPageAction::class,
            'allowed_methods' => ['GET'],
            'options' => [
                'id' => '\d+'
            ]
        ]
    ],
];
