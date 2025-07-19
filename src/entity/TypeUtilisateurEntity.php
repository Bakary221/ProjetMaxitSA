<?php

    namespace App\Entity;

    use App\Core\Abstract\AbstractEntity;

    class TypeUtilisateurEntity extends AbstractEntity{
      private int $id;
      private string $nom;
      private array $Utilisateur;
      public function __construct($id = 0 ,$nom = ""){
        $this->id = $id;
        $this->nom = $nom;
        $this->Utilisateur = [];
      }


      public function getId()
      {
        return $this->id;
      }


      public function setId($id)
      {
        $this->id = $id;

        return $this;
      }

      public function getNom()
      {
        return $this->nom;
      }

      
      public function setNom($nom)
      {
        $this->nom = $nom;

        return $this;
      }

      
      public function addUtilisateur($Utilisateur)
      {
        return $this->Utilisateur [] = $Utilisateur;
      }

      
      public function getUtilisateur()
      {
        return $this->Utilisateur;
      }

      public static function toObject($data): static
      {
          $typeUtilisateur = new static(
              $data['id'] ?? 0,
              $data['nom'] ?? ''
          );

          if (isset($data['Utilisateur']) && is_array($data['Utilisateur'])) {
              $utilisateurs = array_map(
                  fn($u) => UtilisateurEntity::toObject($u),
                  $data['Utilisateur']
              );
              $typeUtilisateur->Utilisateur = $utilisateurs;
          }

          return $typeUtilisateur;
      }

      public function toArray(): array
      {
          return [
              'id' => $this->id,
              'nom' => $this->nom,
              'Utilisateur' => array_map(fn($u) => $u->toArray(), $this->Utilisateur)
          ];
      }
  }

