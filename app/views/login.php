<?php
require_once '../controllers/AuthController.php';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $auth = new AuthController();
    $auth->login();
}

?>


<?php if (isset($_GET['error'])): ?>
    <p style="color: red;">
        <?php
        if ($_GET['error'] == "invalid_credentials") {
            echo "Email ou mot de passe incorrect.";
        } elseif ($_GET['error'] == "missing_fields") {
            echo "Veuillez remplir tous les champs.";
        }
        ?>
    </p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="../assets/styles/login.css">
</head>

<body>
    <main>
        <form method="POST" action="#" id="form-login">
            <div id="container-image">
                <img src="../assets/img/logo.png" alt="Logo">
            </div>
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </main>
</body>

</html>