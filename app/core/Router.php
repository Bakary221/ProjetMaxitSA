<?php

    namespace App\Core;

    use App\Core\Error_404;

    class Router{

        public static function resolver($routes){
            $uri =  parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
            if (isset($routes[$uri])){
                $controllerNom = $routes[$uri]['controller'];
                $controllerAction = $routes[$uri]['action'];

                $controller = new $controllerNom();
                $controller->$controllerAction();
            }else{
                Error_404::render();
            }
        }
    }