<?php
session_start(); 

if (isset($_POST['submit'])) {
    $login = $_POST['user'];
    $password = $_POST['pass'];

    if ($login === "user" && $password === "1234") {
        $_SESSION['auth'] = true; 
        header("Location: profil.php"); 
        exit;
    } else {
        $error = "Login ou mot de passe incorrect !";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container">
        <h2>Authentification</h2>

        <p class="error-msg"> <?php if(isset($error)) echo $error; ?></p>
        
        <form method="POST">
            <label>Utilisateur :</label>
            <input type="text" name="user" required>
            
            <label>Mot de passe :</label>
            <input type="password" name="pass" required>
            
            <button type="submit" name="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>