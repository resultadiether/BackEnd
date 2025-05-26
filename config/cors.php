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
        'https://front-end-nvxe-git-main-diether-resultas-projects.vercel.app',
        'https://front-end-nvxe-g09zy4uq9-diether-resultas-projects.vercel.app',
    ],

    'allowed_origins_patterns' => [
        '^https:\/\/front-end-nvxe.*\.vercel\.app$',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
