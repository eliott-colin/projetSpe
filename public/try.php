<?php
require_once '../app/config/database.php'; // Assure-toi que ton fichier de connexion est bien inclus

$db = Database::getInstance(); // Récupération de la connexion PDO

$email = 'eliott@gmail.com';
$newPassword = 'nouveauMotDePasse';
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$stmt = $db->prepare("UPDATE users SET password = :password WHERE mail = :email");
$stmt->execute([
    'password' => $hashedPassword,
    'email' => $email
]);

if ($stmt->rowCount() > 0) {
    echo "Mot de passe mis à jour avec succès.";
} else {
    echo "Aucune mise à jour effectuée. Vérifie l'email.";
}
?>
