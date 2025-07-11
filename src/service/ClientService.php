<?php

    namespace App\Service;

    use App\Core\App;
    use App\Repository\ClientRepository;

    class ClientService
    {
        private static ?ClientService $instance = null;
        private ClientRepository $clientRepository;

        private function __construct()
        {
            $this->clientRepository = App::getDependancy('clientRepository');
        }

        public static function getInstance(): ClientService
        {
            if (self::$instance === null) {
                self::$instance = new ClientService();
            }
            return self::$instance;
        }

        public function seConnecter(string $login)
        {
            return $this->clientRepository->connexion($login);
        }

        public function inscription(array $data)
        {
            return $this->clientRepository->insert($data);
        }
    }
