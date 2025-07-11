<?php

    namespace App\Core;

    class ValidatorStatic
    {
        public static array $errors = [];

        public static function require(string $field, ?string $value): void
        {
            if (empty(trim($value))) {
                self::$errors[$field] = ErrorMessage::OBLIGATOIRE->value;
            }
        }
        
        public static function email(string $field, ?string $value): void
        {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                self::$errors[$field] = ErrorMessage::EMAIL_INVALIDE->value;
            }
        }

        public static function phoneSN(string $field, ?string $value): void
        {
            if (!preg_match('/^(77|78|76|70|75)\d{7}$/', $value)) {
                self::$errors[$field] = ErrorMessage::NUMERO_INVALIDE->value;
            }
        }

        public static function cniSN(string $field, ?string $value): void
        {
            if (!preg_match('/^\d{13}$/', $value)) {
                self::$errors[$field] = ErrorMessage::CNI_INVALIDE->value;
            }
        }


    }