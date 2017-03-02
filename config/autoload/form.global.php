<?php

use CodeEmailMkt\Application\Form\Factory\{ClientFormFactory, LoginFormFactory};
use CodeEmailMkt\Application\Form\{ClientForm, LoginForm};
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
			ClientForm::class => ClientFormFactory::class,
			LoginForm::class  => LoginFormFactory::class
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