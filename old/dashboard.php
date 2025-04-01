<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <aside class="sidebar">
            <div class="profile">
                <img src="image.png" alt="Profile Picture">
                <p class="name"><?php echo $_SESSION['name'] . " " . $_SESSION['firstname']; ?></p>
                <p class="mail"><?php echo $_SESSION['email']; ?></p>
            </div>
            <nav>
                <ul>
                    <li class="selected"><a href="dashboard.php">Home</a></li>
                    <li><a href="workshop.php">Workshops</a></li>
                    <li><a href="show.php">Shows</a></li>
                    <li><a href="settings.php">Settings</a></li>
                </ul>
            </nav>
        </aside>
    </header>
    <main>
        <section>
            <h1>Dashboard</h1>
            <p>Bienvenue <?php echo $_SESSION['name'] . " " . $_SESSION['firstname']; ?> !</p>
        </section>
    </main>
    
</body>
</html>

