<?php
session_start();
$servername = "localhost"; 
$username = "root";
$password = "root"; 
$dbname = "theatrapp";

try {
    $dbPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("La connexion a échoué : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $stmt = $dbPDO->prepare("SELECT * FROM users WHERE mail = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) { 
        $_SESSION['user_id'] = $user['id_user'];  
        $_SESSION['email'] = $user['mail'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['firstname'] = $user['firstname'];

        echo "Connexion réussie ! Redirection...";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>