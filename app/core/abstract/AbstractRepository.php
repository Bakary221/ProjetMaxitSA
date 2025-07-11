<?php

    namespace App\Core\Abstract;

    abstract class AbstractRepository{
        protected ?\PDO $pdo;

        public function __construct()
        {
            $this->pdo = \App\Core\App::getDependancy('database')->getConnection();
        }

        abstract public function selectAll();
        abstract public function insert($data);
        abstract public function update();
        abstract public function delete();
        abstract public function selectById();
        abstract public function selectBy(array $filter);
    } 



