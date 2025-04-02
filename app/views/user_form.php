<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="user-container">
        <h2>Informations Utilisateur</h2>

        <form action="user_update.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

            <label>Nom</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

            <label>Prénom</label>
            <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

            <label>E-mail</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['mail']) ?>" required>

            <div class="profile-section">
                <img src="<?= htmlspecialchars($user['profile_picture'] ?? 'default.png') ?>" alt="Profile" class="profile-img">
                <form action="profile_upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                    <input type="file" name="profile_image">
                    <button type="submit">Changer</button>
                </form>
                <form action="profile_delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>
