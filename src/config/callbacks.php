<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route prefix
    |--------------------------------------------------------------------------
    */
    'prefix' => 'callbacks',

    /*
    |--------------------------------------------------------------------------
    | Global middleware
    |--------------------------------------------------------------------------
    | e.g.
    |   'middleware' => [
    |       ExampleMiddleware::class,
    |       'midleware-alias',
    |       'middleware-group',
    |   ],
    */
    'middleware' => [],

    /*
    |--------------------------------------------------------------------------
    | Callbacks
    |--------------------------------------------------------------------------
    | e.g.
    |   'callbacks' => [
    |       App\Callbacks\Example::class,
    |   ],
    |
    | callbacks are available at prefix/callback-name e.g. service.orbitremit.com/service/v1/callbacks/example-callback
    */
    'callbacks' => [
        App\Callbacks\ExampleCallback::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Limiters
    |--------------------------------------------------------------------------
    | e.g.
    |   'limiters' => [
    |       'limiter-name' => [
    |           'handler' => App\Limiters\Example::class,
    |           'optionOne' => 'value',
    |       ],
    |   ],
    */
    'limiters' => [
        'funnel' => [
            'handler' => OrbitRemit\LaravelCallbacks\Limiters\RedisFunnel::class,
            'maxAttempts' => 10,
            'releaseAfter' => 10,
            'blockFor' => 0,
        ],
        'throttle' => [
            'handler' => OrbitRemit\LaravelCallbacks\Limiters\RedisThrottle::class,
            'maxAttempts' => 10,
            'decaySeconds' => 10,
            'blockFor' => 0,
        ],
    ],
];
