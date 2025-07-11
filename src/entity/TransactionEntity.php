<?php
    namespace App\Entity;

    use App\Core\Abstract\AbstractEntity;

    class TransactionEntity extends AbstractEntity{
      private int $id;
      private float $montant;
      private string $date;
      private CompteEntity $compte;
      private TypeTransactionEnum $typetransaction;


      public function __construct($id = 0, $montant = 0.0, $date = "", $typetransaction = TypeTransactionEnum::DEPOT)
      {
        $this->id = $id;
        $this->montant = $montant;
        $this->date = $date;
        $this->compte = new CompteEntity();

        if (is_string($typetransaction)) {
                $this->typetransaction = TypeTransactionEnum::from($typetransaction);
            } else {
                $this->typetransaction = $typetransaction;
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

      public function getMontant()
      {
        return $this->montant;
      }


      public function setMontant($montant)
      {
        $this->montant = $montant;

        return $this;
      }

      public function getDate()
      {
        return $this->date;
      }

    
      public function setDate($date)
      {
        $this->date = $date;

        return $this;
      }

      public function getCompte()
      {
        return $this->compte;
      }

    
      public function setCompte($compte)
      {
        $this->compte = $compte;

        return $this;
      }

    
      public function getTypetransaction()
      {
        return $this->typetransaction;
      }

    
      public function setTypetransaction($typetransaction)
      {
        $this->typetransaction = $typetransaction;

        return $this;
      }

      public static function toObject($data): static
      {
          $transaction = new static(
              $data['id'] ?? 0,
              $data['montant'] ?? 0.0,
              $data['date'] ?? '',
              $data['typetransaction'] ?? TypeTransactionEnum::DEPOT
          );

          if (isset($data['compte'])) {
              $transaction->setCompte(CompteEntity::toObject($data['compte']));
          }

          return $transaction;
      }


      public function toArray(): array
      {
          return [
              'id' => $this->id,
              'montant' => $this->montant,
              'date' => $this->date,
              'typetransaction' => $this->typetransaction,
              'compte' => $this->compte->toArray()
          ];
      }


    }

