<?php
session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Espace Privé</h2>
    <p>Bienvenue, vous êtes connecté avec succès.</p>
    
    <form action="deconnexion.php" method="POST">
        <button type="submit" class="logout-btn">Se déconnecter</button>
    </form>
</div>
</body>
</html>