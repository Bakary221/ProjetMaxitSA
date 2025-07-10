<?php

    namespace App\Config;

    $middlewares = [
        'auth' => \App\Core\Middlewares\Auth::class,
        'cryptPassword' => \App\Core\Middlewares\CryptPassword::class,
    ];
