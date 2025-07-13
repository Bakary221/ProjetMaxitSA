<?php

    use App\Core\App;

    require_once __DIR__. "/env.php";
    require_once __DIR__ . "/middlewares.php";
    $routes = require_once __DIR__ . "/../../routes/route.web.php";


    App::init();
