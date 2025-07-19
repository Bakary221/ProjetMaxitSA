<?php

    use App\Controller\ClientController;
    use App\Controller\SecurityController;

    return [
        "/" => [
            "controller" => SecurityController::class,
            "action" => "create",
            "middleware" => []
        ],
        "/inscription" => [
            "controller" => SecurityController::class,
            "action" => "show",
            "middleware" => []
        ],
        "/login" => [
            "controller" => SecurityController::class,
            "action" => "login",
            "middleware" => []
        ],
        "/acceuil" => [
            "controller" => ClientController::class,
            "action" => "index",
            "middleware" => []
        ],
        "/signUp" => [
            "controller" => SecurityController::class,
            "action" => "register",
            "middleware" => ['cryptPassword']
        ],
        "/logout" => [
            "controller" => SecurityController::class,
            "action" => "logout",
            "middleware" => []
        ],
        "/compteSecondaire" => [
            "controller" => ClientController::class,
            "action" => "compteSecondaire",
            "middleware" => []
        ]
    ];
