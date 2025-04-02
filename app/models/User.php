<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
require_once __DIR__ . '/../../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function authenticate($email, $password)
    {
        $stmt = $this->db->prepare("SELECT users.*, roles.name AS role FROM users INNER JOIN user_roles ON users.id_user = user_roles.id_user INNER JOIN roles ON roles.id_roles = user_roles.id_roles WHERE mail = :email ORDER BY roles.id_roles DESC LIMIT 1;");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && $password) {
            return $user; // Retourne l'utilisateur si l'authentification est réussie
        }
        return false;
        // A mettre une fois création de compte par admin
        // if ($user && password_verify($password, $user['password'])) {
        //     return $user; // Retourne l'utilisateur si l'authentification est réussie
        // }
        // return false;
    }
}
?>