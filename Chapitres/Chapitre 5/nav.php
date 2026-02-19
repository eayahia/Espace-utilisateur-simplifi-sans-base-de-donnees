<?php
session_start();
?>

<nav style="background:#eee;padding:10px;">
    <a href="login.php">Login</a> |
    <a href="dashboard.php">Dashboard</a> |
    <?php if(isset($_SESSION['user'])): ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</nav>
<hr>
