<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit;
}
?>
<nav>
<a href="login.php">Login</a> | 
    <a href="profil.php" style="font-weight: bold;">Profil</a> | 
    <a href="logout.php" style="color: red;">Logout</a>
</nav>
<?php
echo "<h1>Bienvenue " . $_SESSION['utilisateur'] . " !</h1>";
echo "<a href='logout.php'>Se déconnecter</a>";
?>