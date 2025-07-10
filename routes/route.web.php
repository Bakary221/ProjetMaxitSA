<?php

    use App\Controller\ClientController;
    use App\Controller\SecurityController;

    return $routes = [
            "/" => [
                "controller" => SecurityController::class,
                "action" => "create",
            ],
            "/inscription" => [
                "controller" => SecurityController::class,
                "action" => "show",
            ],
            "/login" => [
                "controller" => SecurityController::class,
                "action" => "login",
            ],
            "/acceuil" => [
                "controller" => ClientController::class,
                "action" => "index",
            ],
    ];