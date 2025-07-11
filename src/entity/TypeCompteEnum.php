<?php

    namespace App\Entity;

    enum TypeCompteEnum: string {
        case PRINCIPALE = 'principal';
        case SECONDAIRE = 'secondaire';
    }