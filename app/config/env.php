 <?php
    require_once __DIR__ . '/../../vendor/autoload.php';
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    define("DB_DSN",$_ENV['DB_DSN']);
    define("HOST",$_ENV['HOST']);
    define("DB_USER", $_ENV['DB_USER']);
    define("DB_PASSWORD" , $_ENV['DB_PASSWORD']);
    define("DB_DSN1" , $_ENV['DB_DSN1']);


    
    