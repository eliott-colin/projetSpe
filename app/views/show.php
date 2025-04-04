<?php

use BcMath\Number;
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
    <title>Workshop</title>
    <link rel="stylesheet" href="../assets/styles/workshop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/styles/sidebar.css">
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
                    <li class="selected">
                        <a href="show.php"><i class="fa-solid fa-theater-masks"></i> Shows</a>
                    </li>
                    <li>
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
        <?php
        if ($_SESSION['role'] == "admin") {
            require_once '../controllers/ShowController.php';
            $show = new ShowController();
            require_once '../controllers/WorkshopController.php';
            $workshop = new WorkshopController();
            require_once '../controllers/UserController.php';
            $user = new UserController();
            echo "
    <div class='container'>
        <div class='card'>
            <h2>To do</h2>
        </div>
        <div class='workshops'>
            <div class='headerContainer'>
            <i class='fa-solid fa-arrow-left'></i>
            <h2>Nos Spectacles</h2>
            <i class='fa-solid fa-arrow-right'></i>
            </div>
            <p class='month'>MARS - 2028</p>
            <div class='workshop-list'>
                <button class='workshop-item'>12/03/2028 - Paris - Roméo & Juliette</button>
                <button class='workshop-item'>12/03/2028 - Paris - Roméo & Juliette</button>
                <button class='workshop-item'>12/03/2028 - Paris - Roméo & Juliette</button>
                <button class='workshop-item'>12/03/2028 - Paris - Roméo & Juliette</button>
                <button class='workshop-item'>12/03/2028 - Paris - Roméo & Juliette</button>
            </div>
        </div>
    </div>
                ";
        } else {
            echo "
                <section>
                    <h1>Dashboard</h1>
                    <p>Bienvenue {$_SESSION['name']} {$_SESSION['firstname']} !</p>
                </section>";
        }
        ?>
    </main>
    <script src="../assets/js/script.js"></script>
</body>

</html>