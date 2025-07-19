<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Core\App;

class TransactionRepository extends AbstractRepository
{
    private static ?self $instance = null;

    private function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function selectAll() {}

    public function selectBy(array $filter) {}

    public function selectById() {}

    public function insert($data) {}

    public function update() {}

    public function delete() {}

    public function selectAllTransaction($idcompte)
    {
        $sql = "SELECT * FROM transaction WHERE idCompte = :idcompte AND type = principale";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idcompte', $idcompte);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
