<?php
use ZenPROPERTY;
d\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;
use CodeEmailMkt\Domain\Repository;
use CodeEmailMkt\Infrastructure\Persistence;

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
            
            Repository\ClientRepositoryInterface::class =>
                Persistence\Doctrine\Repository\ClientRepositoryFactory::class,
            
            Repository\AddressRepositoryInterface::class =>
                Persistence\Doctrine\Repository\AddressRepositoryFactory::class,
            
            Aura\Session\Session::class =>
                DaMess\Factory\AuraSessionFactory::class,
        ],
        'aliases' => [
            'configuration' => 'config', //Doctrine needs a service called Configuration
        ],
    ],
];
