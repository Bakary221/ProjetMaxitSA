<?php

    namespace App\Entity;

    enum TypeTransactionEnum: string {
        case DEPOT = 'depot';
        case RETRAIT = 'retrait';
        case PAIEMENT = 'paiement';
    }

    