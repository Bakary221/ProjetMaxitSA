<?php

    namespace App\Entity;

    enum StatutTransactionEnum: string {
        case REUSSI = 'Reussi';
        case EN_ATTENTE = 'En attente';
        case ECHEC = 'Echec';
        case ANNULE = 'Annulé';
    }
