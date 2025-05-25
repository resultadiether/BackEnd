<?php

return [
   

    'paths' => ['api/*', 'login', 'register', 'logout', 'profile'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['https://front-end-nvxe-git-main-diether-resultas-projects.vercel.app/', 'http://localhost:3000'],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
]; 