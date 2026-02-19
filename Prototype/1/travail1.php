<?php
if (isset($_POST['save'])) {
    $expire = time() + 3600; 
    setcookie('cookie_user', $_POST['user'], $expire);
    setcookie('cookie_color', $_POST['color'], $expire);
    setcookie('cookie_lang', $_POST['lang'], $expire);
    setcookie('cookie_last_update_date', date('d/m/Y H:i:s'), $expire);
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit();
}

if (isset($_POST['reset'])) {
    $past = time() - 3600;
    setcookie('cookie_user', '', $past);
    setcookie('cookie_color', '', $past);
    setcookie('cookie_lang', '', $past);
    setcookie('cookie_last_update_date', '', $past);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$bg_color = $_COOKIE['cookie_color'] ?? '#ffffff';
$lang = $_COOKIE['cookie_lang'] ?? 'fr';
$user_name = $_COOKIE['cookie_user'] ?? 'Invité';
$last_visit = $_COOKIE['cookie_last_update_date'] ?? 'Aucune (Première visite)';

$welcome_msg = ($lang == 'en') ? "Welcome" : "Bienvenue";
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title>Préférences Utilisateur</title>
</head>
<body style="background-color: <?php echo $bg_color; ?>;">

    <h1><?php echo "$welcome_msg, $user_name"; ?></h1>
    <p>Dernière visite enregistrée : <strong><?php echo $last_visit; ?></strong></p>

    <hr>

    <form method="POST">
        <label>Nom :</label> 
        <input type="text" name="user" value="<?php echo ($user_name != 'Invité') ? $user_name : ''; ?>" required><br><br>
        
        <label>Couleur de fond :</label> 
        <input type="color" name="color" value="<?php echo $bg_color; ?>"><br><br>
        
        <label>Langue :</label> 
        <input type="radio" name="lang" value="fr" <?php if($lang == 'fr') echo 'checked'; ?>> Français
        <input type="radio" name="lang" value="en" <?php if($lang == 'en') echo 'checked'; ?>> Anglais<br><br>
        
        <button type="submit" name="save">Enregistrer mes choix</button>
        
        <button type="submit" name="reset" >Reinitialiser </button>
    </form>

</body>
</html>