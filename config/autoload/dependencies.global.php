<?php
use CodeEmailMkt\Domain\Repository\{
    AddressRepositoryInterface,
    CampaignRepositoryInterface,
    ClientRepositoryInterface,
    TagRepositoryInterface,
    Criteria\FindByNameCriteriaInterface,
    Criteria\FindByIdCriteriaInterface
};
use CodeEmailMkt\Domain\Service\{
    AuthServiceInterface,
    BootstrapInterface,
    CampaignEmailSenderInterface,
    CampaignReportInterface,
    FlashMessageInterface
};
use CodeEmailMkt\Infrastructure\Service\{
    AuthServiceFactory,
    BootstrapFactory,
    CampaignEmailSenderFactory,
    CampaignReportFactory,
    FlashMessageFactory,
    MailgunFactory
};
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\{
    AddressRepositoryFactory,
    CampaignRepositoryFactory,
    ClientRepositoryFactory,
    TagRepositoryFactory,
    Criteria\FindByNameCriteria,
    Criteria\FindByIdCriteria
};
use Mailgun\Mailgun;
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
            FindByNameCriteriaInterface::class => FindByNameCriteria::class,
            FindByIdCriteriaInterface::class => FindByIdCriteria::class
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
            
            // Application Services
            FlashMessageInterface::class        => FlashMessageFactory::class,
            CampaignEmailSenderInterface::class => CampaignEmailSenderFactory::class,
            CampaignReportInterface::class      => CampaignReportFactory::class,
            AuthServiceInterface::class         => AuthServiceFactory::class,

            //Package Services
            Mailgun::class                      => MailgunFactory::class,
            'doctrine:fixtures_cmd:load'        => CodeEdu\FixtureFactory::class, // Para criar o comando de fixtures

        ],
        'aliases' => [
            'configuration' => 'config', //Doctrine needs a service called Configuration
            'Config'        => 'config',
            'Configuration' => 'config',
            AuthenticationService::class => 'doctrine.authenticationservice.orm_default'
        ],
    ],
];
