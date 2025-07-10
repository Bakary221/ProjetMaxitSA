<?php

    use App\Core\App;

    require_once __DIR__. "/env.php";
    App::init();
    $routes = require_once __DIR__ . "/../../routes/route.web.php";


    // Define 
    define('HOST' , $_ENV['HOST']);
    define('DB_DSN', $_ENV['DB_DSN']);