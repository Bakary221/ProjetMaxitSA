<?php

    namespace App\Core\Middlewares;

    use App\Core\App;

    class Auth
    {
        public function __invoke()
        {
            if (!App::getDependancy('session')->isset('user')) {
                header('Location: /');
                exit;
            }else {
                $user = App::getDependancy('session')->get('user');
                    if ($user["nom"] !== 'client') {
                    header('Location: /acceuil');
                    exit;
                }
            }
        }
    }
