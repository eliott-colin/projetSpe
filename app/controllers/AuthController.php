<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            

            if (!empty($email) && !empty($password)) {
                $user = $this->userModel->authenticate($email, $password);
                //$test = empty($user) ? 'Vide' : 'Pas vide';
                if ($user) {
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['email'] = $user['mail'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['firstname'] = $user['firstname'];

                    header("Location: ../views/dashboard.php");
                    exit();
                } else {
                    header("Location: /login.php?error=invalid_credentials");
                    exit();
                }
            } else {
                header("Location: /login.php?error=missing_fields");
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login.php");
        exit();
    }
}
?>
