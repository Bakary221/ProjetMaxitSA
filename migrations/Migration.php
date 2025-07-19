<?php
namespace App\Migrations;

use App\Core\App;
use PDO;

class Migration {
    private PDO $pdo;
    private string $dbName;

    public function __construct() {
        $this->pdo = new PDO($_ENV['DB_DSN1'] , $_ENV['DB_USER'] , $_ENV['DB_PASSWORD']);
        $this->dbName = $_ENV['DB_NAME'];
    }

    public function run() {
        $this->pdo->exec("CREATE DATABASE {$this->dbName}");
        $this->pdo = new \PDO("pgsql:host=". $_ENV['DB_HOST']. ";port= ".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'] , $_ENV['DB_PASSWORD']);

        $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100),
                email VARCHAR(100)
            );
        ";
        $this->pdo->exec($sql);
        echo "✔ Tables créées.\n";
    }
}
