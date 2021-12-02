<?php

return [
    'services' => [
        'debug' => env('APP_DEBUG', false),
        'verify' => env('OR_SERVICES_SSL_VERIFY', false),
        'base_uri' => env('OR_SERVICES_BASE_URI', 'https://services.orbitremit.io/'),
        'client_id' => env('OR_SERVICES_CLIENT_ID', null),
        'client_secret' => env('OR_SERVICES_CLIENT_SECRET', null),
        'gateway_auth_token' => env('OR_SERVICES_GATEWAY_AUTH_TOKEN', null),
        'client' => 'ServiceName/1.0',
        'middleware' => [
            'userAgent',
        ],
    ]
];
