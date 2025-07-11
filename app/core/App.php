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

            self::registerDependency('clientRepository', \App\Repository\ClientRepository::getInstance());
            self::registerDependency('TransactionRepository', \App\Repository\TransactionRepository::getInstance());
            self::registerDependency('clientService', \App\Service\ClientService::getInstance());
        }


        public static function getDependancy($name){
            if(array_key_exists($name, self::$dependancies)){
                return self::$dependancies[$name];
            }
            throw new \Exception("Dependancies non trouvé: " . $name);
        }

        
        public static function registerDependency($name, $instance){
            if(!array_key_exists($name, self::$dependancies)){
                self::$dependancies[$name] = $instance;
            } else {
                throw new \Exception("Dependancy déjà enregistrée: " . $name);
            }
        }
    }