<?php

    namespace App\Entity;

    use App\Core\Abstract\AbstractEntity;

    class CompteEntity extends AbstractEntity{
      private int $id;
      private string $dateCreation;
      private float $solde;
      private string $numeroCompte;
      private array $transaction;
      private UtilisateurEntity $Utilisateur;
      private TypeCompteEnum $statut_compte;


      public function __construct($id = 0, $dateCreation = "", $solde = 0.0, $numeroCompte = "", $statut_compte = TypeCompteEnum::PRINCIPALE)
      {
          $this->id = $id;
          $this->dateCreation = $dateCreation;
          $this->solde = $solde;
          $this->numeroCompte = $numeroCompte;
          $this->transaction = [];
          $this->Utilisateur = new UtilisateurEntity();
          if (is_string($statut_compte)) {
              $this->statut_compte = TypeCompteEnum::from($statut_compte);
          } else {
              $this->statut_compte = $statut_compte;
          }
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

      
      public function getDateCreation()
      {
        return $this->dateCreation;
      }

    
      public function setDateCreation($dateCreation)
      {
        $this->dateCreation = $dateCreation;

        return $this;
      }

    
      public function getSolde()
      {
        return $this->solde;
      }

      
      public function setSolde($solde)
      {
        $this->solde = $solde;

        return $this;
      }

      
      public function getNumeroCompte()
      {
        return $this->numeroCompte;
      }

    
      public function setNumeroCompte($numeroCompte)
      {
        $this->numeroCompte = $numeroCompte;

        return $this;
      }

      
      public function getTransaction()
      {
        return $this->transaction;
      }


      public function setTransaction($transaction)
      {
        $this->transaction = $transaction;

        return $this;
      }

      
      public function addtUtilisateur($Utilisateur)
      {
        return $this->Utilisateur[] = $Utilisateur;
      }

      public function setUtilisateur($Utilisateur)
      {
        $this->Utilisateur = $Utilisateur;

        return $this;
      }

      
      public function setStatut_compte($statut_compte)
      {
        $this->statut_compte = $statut_compte;

        return $this;
      }

      
      public function getStatut_compte()
      {
        return $this->statut_compte;
      }


      public static function toObject($data): static
      {
          $compte = new static(
              $data['id'] ?? 0,
              $data['dateCreation'] ?? '',
              $data['solde'] ?? 0.0,
              $data['numeroCompte'] ?? '',
              $data['statut_compte'] ?? TypeCompteEnum::PRINCIPALE
          );

          if (isset($data['Utilisateur'])) {
              $compte->setUtilisateur(UtilisateurEntity::toObject($data['Utilisateur']));
          }

          if (isset($data['transaction']) && is_array($data['transaction'])) {
              $transactions = array_map(
                  fn($t) => TransactionEntity::toObject($t),
                  $data['transaction']
              );
              $compte->setTransaction($transactions);
          }

          return $compte;
      }


      public function toArray(): array
      {
          return [
              'id' => $this->id,
              'dateCreation' => $this->dateCreation,
              'solde' => $this->solde,
              'numeroCompte' => $this->numeroCompte,
              'statut_compte' => $this->statut_compte,
              'Utilisateur' => $this->Utilisateur->toArray(),
              'transaction' => array_map(fn($t) => $t->toArray(), $this->transaction)
          ];
      }

    }

