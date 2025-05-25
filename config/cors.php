<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'register',
        'login',
        'logout',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://front-end-nvxe.vercel.app',
        'https://front-end-nvxe-4xlex8ulg-diether-resultas-projects.vercel.app',
        'https://front-end-nvxe-3ti6re6rb5-diether-resultas-projects.vercel.app', // also add this since it's in your screenshot
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];
