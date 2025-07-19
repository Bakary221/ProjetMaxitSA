<?php

    namespace App\Repository;

    use App\Core\Abstract\AbstractRepository;
    use App\Core\App;
    use PDO;

    class ClientRepository extends AbstractRepository
    {
        private static ?self $instance = null;
        // private ?PDO $pdo;

        // private function __construct()
        // {
        //     $this->pdo = App::getDependancy('database')->getConnection();
        // }

        public static function getInstance(): self
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function selectAll(){}

        public function selectBy(array $filter){}

        public function selectById(){}

        public function update(){}

        public function delete(){}


        public function insert($data)
        {
            try {
                $this->pdo->beginTransaction();

                $sql = "INSERT INTO utilisateur 
                    (nom, prenom, numeroTelephone, login, password, numeroIdentite, photorecto, photoverso, idTypeUtilisateur)
                    VALUES (:nom, :prenom, :numeroTelephone, :login, :password, :numeroIdentite, :photorecto, :photoverso, :idTypeUtilisateur)";
                
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':nom', $data['nom']);
                $stmt->bindValue(':prenom', $data['prenom']);
                $stmt->bindValue(':numeroTelephone', $data['numeroTelephone']);
                $stmt->bindValue(':login', $data['login']);
                $stmt->bindValue(':password', $data['password']);
                $stmt->bindValue(':numeroIdentite', $data['numeroIdentite']);
                $stmt->bindValue(':photorecto', $data['photoRecto']);
                $stmt->bindValue(':photoverso', $data['photoVerso']);
                $stmt->bindValue(':idTypeUtilisateur', $data['idTypeUtilisateur']);

                $stmt->execute();

                $userId = $this->pdo->lastInsertId();

                $sqlCompte = "INSERT INTO compte 
                    (date_creation, solde, numeroCompte, type, idUtilisateur)
                    VALUES (:date_creation, :solde, :numeroCompte, :type, :idUtilisateur)";
                
                $stmtCompte = $this->pdo->prepare($sqlCompte);
                $stmtCompte->bindValue(':date_creation', date('Y-m-d'));
                $stmtCompte->bindValue(':solde', 0); // solde initial à 0
                $stmtCompte->bindValue(':numeroCompte', rand(100000, 999999));
                $stmtCompte->bindValue(':type', 'principal');
                $stmtCompte->bindValue(':idUtilisateur', $userId);

                $stmtCompte->execute();

                $this->pdo->commit();

                return true;

            } catch (\PDOException $e) {
                $this->pdo->rollBack();
                throw new \Exception("Erreur transactionnelle : " . $e->getMessage());
            }
        }

        public function connexion(string $login): ?\App\Entity\UtilisateurEntity
        {
            $sql = "SELECT * FROM utilisateur WHERE login = :login LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':login', $login);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return null;
            }

            $sqlType = "SELECT * FROM typeutilisateur WHERE id = :id";
            $stmtType = $this->pdo->prepare($sqlType);
            $stmtType->bindValue(':id', $user['idtypeutilisateur']);
            $stmtType->execute();
            $user['typeUtilisateur'] = $stmtType->fetch(PDO::FETCH_ASSOC);

            $sqlCompte = "SELECT * FROM compte WHERE idutilisateur = :id";
            $stmtCompte = $this->pdo->prepare($sqlCompte);
            $stmtCompte->bindValue(':id', $user['id']);
            $stmtCompte->execute();
            $user['compte'] = $stmtCompte->fetchAll(PDO::FETCH_ASSOC);

            return \App\Entity\UtilisateurEntity::toObject($user);
        }

       
        public function ajouterCompte(){
            
        }
    }
