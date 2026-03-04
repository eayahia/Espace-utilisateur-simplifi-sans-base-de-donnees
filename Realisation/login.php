

<?php

    session_start();


    $users = [

        ["name" => "Oussama",
         "password" => "admin123",
         "role" => "administrateur",
         "active" => true
         ],
        ["name" => "Anass",
         "password" => "anass123",
         "role" => "formateur",
         "active" => true
         ],
        ["name" => "Hassan",
         "password" => "hassan123",
         "role" => "apprenant",
         "active" => false
         ],
        ["name" => "Mohamed",
         "password" => "mohamed123",
         "role" => "apprenant",
         "active" => true
         ]  
    ];



    $message = "";



    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"] ?? "";
        $pass = $_POST["password"] ?? "";


    foreach($users as $user) {
        if($user["name"] === $name) {


        if($user["password"] !== $pass) {
            $message = "Password incorrect";
            break;
        }

        if(!$user["active"]) {
            $message = "Comte désactivé";
            break;
        }

        $_SESSION["user"] = $user;
        header("Location: dashboard.php");
        exit();


      }

    }
    
    if(empty($_SESSION["user"]) && $message == "") {
        $message = "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Authentification</h2>
        <p><?php if($message) echo $message; ?> </p>
        <form action="login.php" method="post">
            <label>Name :</label>
            <br>
            <input type="text" name="name" required>
            <br><br>
            <label>password :</label>
            <br>
            <input type="password" name="password" required>
            <br><br>
            <button type="submit" class="logout-btn">Log in</button>
        </form>
    </div>   
</body>
</html>