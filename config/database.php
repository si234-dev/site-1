<?php
return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'migrations' => 'migrations',
    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', null),
            'port'      => env('DB_PORT', null),
            'database'  => env('DB_DATABASE', null),
            'username'  => env('DB_USERNAME', null),
            'password'  => env('DB_PASSWORD', null),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ],
];