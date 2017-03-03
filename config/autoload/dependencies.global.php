<?php
use CodeEmailMkt\Domain\Repository\{
    AddressRepositoryInterface,
    CampaignRepositoryInterface,
    ClientRepositoryInterface,
    TagRepositoryInterface
};
use CodeEmailMkt\Domain\Service\{
    AuthServiceInterface,
    BootstrapInterface,
    FlashMessageInterface
};
use CodeEmailMkt\Infrastructure\Service\{
    AuthServiceFactory,
    BootstrapFactory,
    FlashMessageFactory
};
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\{
    AddressRepositoryFactory,
    CampaignRepositoryFactory,
    ClientRepositoryFactory,
    TagRepositoryFactory
};
use Zend\Authentication\AuthenticationService;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper\{
    ServerUrlHelper,
    UrlHelper,
    UrlHelperFactory
};

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            ServerUrlHelper::class => ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class                  => ApplicationFactory::class,
            UrlHelper::class                    => UrlHelperFactory::class,
            BootstrapInterface::class           => BootstrapFactory::class,

            // Repositories
            ClientRepositoryInterface::class    => ClientRepositoryFactory::class,
            AddressRepositoryInterface::class   => AddressRepositoryFactory::class,
            TagRepositoryInterface::class       => TagRepositoryFactory::class,
            CampaignRepositoryInterface::class  => CampaignRepositoryFactory::class,
            
            FlashMessageInterface::class        => FlashMessageFactory::class,
            // Para criar o comando de fixtures
            'doctrine:fixtures_cmd:load'    => CodeEdu\FixtureFactory::class,
            AuthServiceInterface::class     => AuthServiceFactory::class

        ],
        'aliases' => [
            'configuration' => 'config', //Doctrine needs a service called Configuration
            'Config'        => 'config',
            'Configuration' => 'config',
            AuthenticationService::class => 'doctrine.authenticationservice.orm_default'
        ],
    ],
];
