<?php
    namespace App\Core;

    enum ErrorMessage: string
    {
        case OBLIGATOIRE = "Le champ est requis.";
        case EMAIL_INVALIDE = "Le login est invalide.";
        case MOIN_DE_CARACTERE = "Le champ doit contenir plus de caractères.";
    }

    


