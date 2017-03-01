<?php
use CodeEmailMkt\Domain;
use CodeEmailMkt\Infrastructure;
use Zend\Authentication\AuthenticationService;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

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
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => ApplicationFactory::class,
            
            Helper\UrlHelper::class => 
                Helper\UrlHelperFactory::class,

            Domain\Service\BootstrapInterface::class =>
                Infrastructure\BootstrapFactory::class,
            
            Domain\Repository\ClientRepositoryInterface::class =>
                Infrastructure\Persistence\Doctrine\Repository\ClientRepositoryFactory::class,
            
            Domain\Repository\AddressRepositoryInterface::class =>
                Infrastructure\Persistence\Doctrine\Repository\AddressRepositoryFactory::class,
            
            Domain\Service\FlashMessageInterface::class =>
                Infrastructure\Service\FlashMessageFactory::class,

            // Para criar o comando de fixtures
            'doctrine:fixtures_cmd:load' =>
                CodeEdu\FixtureFactory::class,

            CodeEmailMkt\Domain\Service\AuthServiceInterface::class =>
                CodeEmailMkt\Infrastructure\Service\AuthServiceFactory::class

        ],
        'aliases' => [
            'configuration' => 'config', //Doctrine needs a service called Configuration
            'Config'        => 'config',
            'Configuration' => 'config',
            AuthenticationService::class => 'doctrine.authenticationservice.orm_default'
        ],
    ],
];
