<?php

    namespace App\Config;

    $middlewares = [
        'auth' => \App\Core\Middlewares\Auth::class,
        'cryptPassword' => \App\Core\Middlewares\CryptPassword::class,
    ];


    function getMiddlewares($middleware)
    {
        global $middlewares;

        if (array_key_exists($middleware, $middlewares)) {
            return $middlewares[$middleware];
        }
        throw new \Exception("Middleware non trouvé: " . $middleware);
    }


