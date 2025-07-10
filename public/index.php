<?php

    require_once __DIR__ . "/../app/config/bootstrap.php";

    \App\Core\App::getDependancy("router")::resolver($routes);


