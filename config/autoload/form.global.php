<?php

use CodeEmailMkt\Application\Form\Factory\{
	CampaignFormFactory,
	ClientFormFactory, 
	LoginFormFactory, 
	TagFormFactory
};
use CodeEmailMkt\Application\Form\{
	CampaignForm,
	ClientForm, 
	LoginForm, 
	TagForm
};
use CodeEmailMkt\Infrastructure\View\HelperPluginManagerFactory;
use Zend\View;

$forms = [
	'dependencies' => [
		'aliases' => [

		],
		'invokables' => [
		],
		'factories' => [
			View\HelperPluginManager::class => HelperPluginManagerFactory::class,
			ClientForm::class 	=> ClientFormFactory::class,
			LoginForm::class  	=> LoginFormFactory::class,
			TagForm::class  	=> TagFormFactory::class,
			CampaignForm::class => CampaignFormFactory::class
		]
	],
	'view_helpers' => [
		'aliases' => [
		],
		'invokables' => [
		],
		'factories' => [
			'identity' => View\Helper\Identity::class
		]
	]
];

$configProviderForm = (new \Zend\Form\ConfigProvider())->__invoke();

return \Zend\Stdlib\ArrayUtils::merge($configProviderForm, $forms);