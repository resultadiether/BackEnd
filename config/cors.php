<?php
return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'register', 'login', 'logout'], // Include auth endpoints

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://front-end-nvxe.vercel.app',
        'front-end-nvxe-4xlex8ulg-diether-resultas-projects.vercel.app',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // This is important if you use cookies or Laravel Sanctum

];
