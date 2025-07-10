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

    }