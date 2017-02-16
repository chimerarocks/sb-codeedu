<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' =>  [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host' => '',
                    'port' => '',
                    'user' => '',
                    'dbname' => '',
                    'driverOptions' => [
                        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'
                    ]
                ]
            ]
        ],
        'driver' => [
            'CodeEmailMkt_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../../src/CodeEmailMkt/Infrastructure/Persistence/Doctrine/ORM']
            ],
            'orm_default' => [
                'drivers' => [
                    'CodeEmailMkt\Domain\Entity' => 'CodeEmailMkt_driver'
                ]
            ]
        ]
    ]
];