<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;

    class ClientCompteRepository extends AbstractRepository
    {
        private static ?ClientCompteRepository $instance = null;

        private function __construct()
        {
            parent::__construct(); 
        }

        public static function getInstance(): ClientCompteRepository
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function selectAll() {}
        public function selectBy(array $filter) {}
        public function insert($data) {}
        public function delete() {}
        public function update() {}
        public function selectById() {}

        public function allInfos($id_user)
        {
            $sql = "
                SELECT 
                    u.id AS utilisateur_id, u.nom AS utilisateur_nom, u.prenom, u.numeroTelephone, u.login,
                    c.id AS compte_id, c.numeroCompte, c.solde, c.date_creation, c.type AS type_compte,
                    t.id AS transaction_id, t.montant, t.date AS transaction_date, t.type AS type_transaction
                FROM utilisateur u
                LEFT JOIN compte c ON u.id = c.idUtilisateur
                LEFT JOIN transaction t ON c.id = t.idCompte
                WHERE u.id = :id_user
                ORDER BY c.id, t.date DESC
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id_user' => $id_user]);
            $rows = $stmt->fetchAll();

            $result = [
                'utilisateur' => [],
                'comptes' => []
            ];

            foreach ($rows as $row) {
                if (empty($result['utilisateur'])) {
                    $result['utilisateur'] = [
                        'id' => $row['utilisateur_id'],
                        'nom' => $row['utilisateur_nom'],
                        'prenom' => $row['prenom'],
                        'numeroTelephone' => $row['numeroTelephone'],
                        'login' => $row['login']
                    ];
                }

                if ($row['compte_id']) {
                    if (!isset($result['comptes'][$row['compte_id']])) {
                        $result['comptes'][$row['compte_id']] = [
                            'id' => $row['compte_id'],
                            'numeroCompte' => $row['numeroCompte'],
                            'solde' => $row['solde'],
                            'date_creation' => $row['date_creation'],
                            'type' => $row['type_compte'],
                            'transactions' => []
                        ];
                    }

                    if ($row['transaction_id']) {
                        $result['comptes'][$row['compte_id']]['transactions'][] = [
                            'id' => $row['transaction_id'],
                            'montant' => $row['montant'],
                            'date' => $row['transaction_date'],
                            'type' => $row['type_transaction']
                        ];
                    }
                }
            }

            $result['comptes'] = array_values($result['comptes']);
            return $result;
        }
    }
