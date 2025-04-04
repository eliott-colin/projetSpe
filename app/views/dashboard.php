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
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
    <link rel="stylesheet" href="../assets/styles/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
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
            var_dump($user->getAllUsers());
            echo '<select class="optionUser hidden" name="user">';
            foreach ($user->getAllUsers() as $userData) {
                $id = htmlspecialchars($userData['id_user']);
                $name = htmlspecialchars($userData['name']);
                $firstname = htmlspecialchars($userData['firstname']);
                echo "<option value='{$id}'>{$name} {$firstname}</option>";
            }
            echo '</select>';
            if (!empty($_POST)) {
                if (isset($_POST["nomSpectacle"])) {
                    $showObject = array('id' => $show->getShowCount() + 1, 'name' => $_POST["nomSpectacle"], "place" => $_POST["lieu"], "showDate" => $_POST["date"], "showHour" => $_POST["heure"], "description" => $_POST["description"], "id_theme" => (int) $_POST["categorie"]);
                    $show->addShow($showObject);
                }
                if (isset($_POST["nomWorkshop"])) {
                    $showObject = array('id' => $workshop->getWorkshopCount() + 1, 'name' => $_POST["nomWorkshop"], "place" => $_POST["lieu"], "showDate" => $_POST["date"], "showHour" => $_POST["heure"], "description" => $_POST["description"], "id_user" => (int) $_POST["user"], "id_theme" => (int) $_POST["categorie"]);
                    $workshop->addWorkshop($showObject);
                }
            }
            $test = true;
            echo "
                <h1>Dashboard Admin</h1>
                <p>Bienvenue {$_SESSION['name']} {$_SESSION['firstname']} !</p>
                <section class='topContainer'>
                    <div class='ticketContainer'>
                        <div class='rondContainer'>
                            <div class='rond'></div>
                            <div class='rond'></div>
                            <div class='rond'></div>
                        </div>
                        <div class='ticket'>
                            <h2>En Mars : {$show->getShowCount()} spectacles</h2>
                            <button id='spectacle'>Ajouter un spectacle</button>
                        </div>
                        <div class='rondContainer'>
                            <div class='rond'></div>
                            <div class='rond'></div>
                            <div class='rond'></div>
                        </div>
                    </div>
                    <div class='ticketContainer'>
                        <div class='rondContainer'>
                            <div class='rond'></div>
                            <div class='rond'></div>
                            <div class='rond'></div>
                        </div>
                        <div class='ticket'>
                            <h2>En Mars : {$workshop->getWorkshopCount()} Ateliers</h2>
                            <button id='workshop'>Ajouter un atelier</button>
                        </div>
                        <div class='rondContainer'>
                            <div class='rond'></div>
                            <div class='rond'></div>
                            <div class='rond'></div>
                        </div>
                    </div>
                </section>";
            $bottom = "
                <section class='theContainer'>
                    <section class='mainContainer'>
                        <p>Veuillez choisir une action.</p>
                    </section>
                    <section class='bottomContainer'>
                        <div class='ticketContainer small'>
                            <div class='rondContainer'>
                                <div class='rond'></div>
                                <div class='rond'></div>
                            </div>
                            <div class='ticket'>
                                <h2>Catégories & Thémes</h2>
                                <button>Ajouter</button>
                            </div>
                            <div class='rondContainer'>
                                <div class='rond'></div>
                                <div class='rond'></div>
                            </div>
                        </div>
                        <div class='ticketContainer small'>
                            <div class='rondContainer'>
                                <div class='rond'></div>
                                <div class='rond'></div>
                            </div>
                            <div class='ticket'>
                                <h2>Membres : {$user->getUserCount()}</h2>
                                <button>Gérer les membres</button>
                            </div>
                            <div class='rondContainer'>
                                <div class='rond'></div>
                                <div class='rond'></div>
                            </div>
                        </div>
                    </section>
                </section>
                ";
            if ($test) {
                echo $bottom;
            }
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