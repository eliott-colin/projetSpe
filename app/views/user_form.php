<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../controllers/UserController.php';
$userM = new UserController();
$user = $userM->getUserById(1);
if (isset($_POST["idSup"])) {
    $_SESSION['photo'] = "default.png";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Utilisateur</title>
    <link rel="stylesheet" href="../assets/styles/sidebar.css">
    <link rel="stylesheet" href="../assets/styles/user_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <aside class="sidebar">
            <div class="profile">
                <img src="../assets/img/<?php echo $_SESSION['photo'] ?: 'default.png'; ?>" alt="Profile Picture">
                <p class="name"><?php echo $_SESSION['name'] . " " . $_SESSION['firstname']; ?></p>
                <p class="mail"><?php echo $_SESSION['email']; ?></p>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li>
                        <a href="workshop.php"><i class="fa-solid fa-chalkboard-teacher"></i> Workshops</a>
                    </li>
                    <li>
                        <a href="show.php"><i class="fa-solid fa-theater-masks"></i> Shows</a>
                    </li>
                    <li class="selected">
                        <a href="user_form.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    </li>
                </ul>
                <ul class="logout">
                    <li><a href="logout.php">Se déconnecter</a></li>
                </ul>
            </nav>
        </aside>
    </header>
    <main>
        <div class="user-container">
            <div>
                <h2>Informations Utilisateur</h2>

                <form action="user_update.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id_user']) ?>">

                    <label>Nom</label>
                    <input type="text" name="nom" value="<?= htmlspecialchars($user['name']) ?>" required>

                    <label>Prénom</label>
                    <input type="text" name="prenom" value="<?= htmlspecialchars($user['firstname']) ?>" required>

                    <label>E-mail</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['mail']) ?>" required>
            </div>

            <div class="profile-section">
                <img src="../assets/img/<?= htmlspecialchars($_SESSION['photo'] ?? 'default.png') ?>" alt="Profile"
                    class="profile-img">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id_user']) ?>">
                    <input type="file" name="profile_image">
                    <button type="submit">Changer</button>
                </form>
                <form action="#" method="POST">
                    <input type="hidden" name="idSup" value="<?= htmlspecialchars($user['id_user']) ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>

            <button type="submit">Enregistrer</button>
            </form>
        </div>
    </main>

</body>

</html>