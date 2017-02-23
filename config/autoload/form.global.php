<?php

$forms = [
	'dependencies' => [
		'aliases' => [

		],
		'invokables' => [
		],
		'factories' => [
			Zend\View\HelperPluginManager::class => 
				CodeEmailMkt\Infrastructure\View\HelperPluginManagerFactory::class,
			CodeEmailMkt\Application\Form\ClientForm::class =>
				CodeEmailMkt\Application\Form\Factory\ClientFormFactory::class
		]
	],
	'view_helpers' => [
		'aliases' => [
		],
		'invokables' => [
		],
		'factories' => [
		]
	]
];

$configProviderForm = (new \Zend\Form\ConfigProvider())->__invoke();

return \Zend\Stdlib\ArrayUtils::merge($configProviderForm, $forms);