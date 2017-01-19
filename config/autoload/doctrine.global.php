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
        ]
    ]
];