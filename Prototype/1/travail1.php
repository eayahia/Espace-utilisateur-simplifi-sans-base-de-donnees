<?php
$dict = [
    'fr' => ['hi' => "Bienvenue", 'M' => "Monsieur", 'F' => "Madame", 'name' => "Nom", 'save' => "Enregistrer", 'reset' => "Effacer"],
    'en' => ['hi' => "Welcome",   'M' => "Mr.",     'F' => "Ms.",     'name' => "Name", 'save' => "Save",        'reset' => "Reset"],
    'ar' => ['hi' => "مرحباً",    'M' => "سيد",      'F' => "سيدة",    'name' => "الاسم", 'save' => "حفظ",        'reset' => "مسح"]
];

if (isset($_POST['ok'])) {
    $exp = time() + 3600;
    setcookie('lang',  $_POST['lg'], $exp, "/");
    setcookie('color', $_POST['cl'], $exp, "/");
    setcookie('genre', $_POST['gn'], $exp, "/");
    setcookie('user',  $_POST['un'], $exp, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['clear'])) {
    setcookie('lang',  '', time() - 3600, "/");
    setcookie('color', '', time() - 3600, "/");
    setcookie('genre', '', time() - 3600, "/");
    setcookie('user',  '', time() - 3600, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$L = $_COOKIE['lang']  ?? 'fr';
$C = $_COOKIE['color'] ?? '#ffffff';
$G = $_COOKIE['genre'] ?? 'M';
$U = $_COOKIE['user']  ?? 'Guest';

$txt = $dict[$L];
$title = ($G == 'M') ? $txt['M'] : $txt['F'];
?>

<!DOCTYPE html>
<html lang="<?= $L ?>" dir="<?= $L == 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="UTF-8">
</head>
<body style="background: <?= $C ?>;"> <h1> <?= $txt['hi'] . " " . $title . " " . htmlspecialchars($U) ?> </h1>

    <form method="POST">
        <label><?= $txt['name'] ?>:</label>
        <input type="text" name="un" value="<?= $U != 'Guest' ? htmlspecialchars($U) : '' ?>" required>
        <br><br>

        <input type="radio" name="gn" value="M" <?= $G == 'M' ? 'checked' : '' ?>> <?= $txt['M'] ?>
        <input type="radio" name="gn" value="F" <?= $G == 'F' ? 'checked' : '' ?>> <?= $txt['F'] ?>
        <br><br>

        <select name="lg">
            <option value="fr" <?= $L == 'fr' ? 'selected' : '' ?>>Français</option>
            <option value="en" <?= $L == 'en' ? 'selected' : '' ?>>English</option>
            <option value="ar" <?= $L == 'ar' ? 'selected' : '' ?>>العربية</option>
        </select>
        
        <input type="color" name="cl" value="<?= $C ?>"> 
        <br><br>

        <button type="submit" name="ok"> <?= $txt['save'] ?> </button>
        <button type="submit" name="clear"> <?= $txt['reset'] ?> </button>
    </form>

</body>
</html>
