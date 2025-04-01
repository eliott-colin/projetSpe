<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "theatrapp";

        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
?>
