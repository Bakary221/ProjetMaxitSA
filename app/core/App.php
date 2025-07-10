<?php
    namespace App\Core;

    class App{

        private static $dependancies = [];
        
        public static function init(){
            self::$dependancies = [
                'router' => new \App\Core\Router(),
                'database' => \App\Core\Database::getInstance(),
                'session' => \App\Core\Session::getInstance()
            ];
        }

        public static function getDependancy($name){
            if(array_key_exists($name, self::$dependancies)){
                return self::$dependancies[$name];
            }
            throw new \Exception("Dependancies non trouvé: " . $name);
        }
    }