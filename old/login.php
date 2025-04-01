<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container-login">
        <div class="background-login">
            <form action="login.php" method="POST" id="form-login">
                <div>
                    <p>Identifiant</p>
                    <input type="email" name="email" placeholder="test@test.com" required>
                </div>
                <div>
                    <p>Mots de passe</p>
                    <input type="password" name="password" placeholder="votreMotDePasse" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
    
</body>
</html>