<?php

namespace App\Service;

use App\Core\App;
use App\Repository\ClientCompteRepository;

class ClientCompteService
{
    private static ?ClientCompteService $instance = null;
    private ClientCompteRepository $clientCompteRepo;

    private function __construct()
    {
        $this->clientCompteRepo = App::getDependancy("clientCompteRepository");
    }

    public static function getInstance(): ClientCompteService
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getInfosClient(int $id_user): array
    {
        return $this->clientCompteRepo->allInfos($id_user);
    }

}
