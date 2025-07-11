<?php

    namespace App\Entity;

    use App\Core\Abstract\AbstractEntity;

    class UtilisateurEntity extends AbstractEntity
    {
        private int $id;
        private string $nom;
        private string $prenom;
        private string $adresse;
        private array $compte;
        private string $photoRecto;
        private string $photoVerso;
        private string $login;
        private string $password;
        private TypeUtilisateurEntity $typeUtilisateur;

        public function __construct(
            int $id = 0,
            string $nom = "",
            string $prenom = "",
            string $adresse = "",
            string $photoRecto = "",
            string $photoVerso = "",
            string $login = "",
            string $password = ""
        ) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->compte = [];
            $this->photoRecto = $photoRecto;
            $this->photoVerso = $photoVerso;
            $this->login = $login;
            $this->password = $password;
            $this->typeUtilisateur = new TypeUtilisateurEntity();
        }


        public function getNom(): string { return $this->nom; }
        public function setNom(string $nom): self { $this->nom = $nom; return $this; }

        public function getPrenom(): string { return $this->prenom; }
        public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }

        public function getAdresse(): string { return $this->adresse; }
        public function setAdresse(string $adresse): self { $this->adresse = $adresse; return $this; }

        public function getPhotoRecto(): string { return $this->photoRecto; }
        public function setPhotoRecto(string $photoRecto): self { $this->photoRecto = $photoRecto; return $this; }

        public function getPhotoVerso(): string { return $this->photoVerso; }
        public function setPhotoVerso(string $photoVerso): self { $this->photoVerso = $photoVerso; return $this; }

        public function getLogin(): string { return $this->login; }
        public function setLogin(string $login): self { $this->login = $login; return $this; }

        public function getPassword(): string { return $this->password; }
        public function setPassword(string $password): self { $this->password = $password; return $this; }

        public function getTypeUtilisateur(): TypeUtilisateurEntity { return $this->typeUtilisateur; }
        public function setTypeUtilisateur(TypeUtilisateurEntity $typeUtilisateur): self {
            $this->typeUtilisateur = $typeUtilisateur;
            return $this;
        }

        public function getCompte(): array { return $this->compte; }
        public function setCompte(array $compte): self { $this->compte = $compte; return $this; }


        public static function toObject($data): static
        {
            $utilisateur = new static(
                $data['id'] ?? 0,
                $data['nom'] ?? '',
                $data['prenom'] ?? '',
                $data['adresse'] ?? '',
                $data['photoRecto'] ?? '',
                $data['photoVerso'] ?? '',
                $data['login'] ?? '',
                $data['password'] ?? ''
            );

            if (isset($data['typeUtilisateur'])) {
                $utilisateur->typeUtilisateur = TypeUtilisateurEntity::toObject($data['typeUtilisateur']);
            }

            if (isset($data['compte']) && is_array($data['compte'])) {
                $comptes = array_map(
                    fn($compte) => CompteEntity::toObject($compte),
                    $data['compte']
                );
                $utilisateur->setCompte($comptes);
            }

            return $utilisateur;
        }

        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'adresse' => $this->adresse,
                'photoRecto' => $this->photoRecto,
                'photoVerso' => $this->photoVerso,
                'login' => $this->login,
                'password' => $this->password,
                'typeUtilisateur' => $this->typeUtilisateur->toArray(),
                'compte' => array_map(fn($c) => $c->toArray(), $this->compte)
            ];
        }
    }
