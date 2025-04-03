<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/sidebar.css">
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
            <div class="container-nav">
                <nav>
                    <ul>
                        <li class="selected">
                            <a href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li>
                            <a href="workshop.php"><i class="fa-solid fa-chalkboard-teacher"></i> Workshops</a>
                        </li>
                        <li>
                            <a href="show.php"><i class="fa-solid fa-theater-masks"></i> Shows</a>
                        </li>
                        <li>
                            <a href="user_form.php"><i class="fa-solid fa-gear"></i> Settings</a>
                        </li>
                    </ul>
                </nav>
                <nav>
                    <ul>
                        <li>
                            <a href="logout.php">Se déconnecter</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </header>
    <main>
        <?php
        if ($_SESSION['role'] == "admin") {
            echo "
                <section>
                    <h1>Dashboard Admin</h1>
                    <p>Bienvenue {$_SESSION['name']} {$_SESSION['firstname']} !</p>
                </section>";
        } else {
            echo "
                <section>
                    <h1>Dashboard</h1>
                    <p>Bienvenue {$_SESSION['name']} {$_SESSION['firstname']} !</p>
                </section>";
        }
        ?>
    </main>
</body>

</html>