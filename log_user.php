<?php
session_start();
include_once('environnement.php');

if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);

    $request = $db->prepare('SELECT * FROM users 
    WHERE pseudo = ?');
    $request->execute(array($username));
    $user = $request->fetch();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php?login=' . $username);
        exit;
    } else {
        // header('Location: log_user.php?login=false');
        exit;
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Se connecter</title>
</head>

<body>
    <?php include('nav.php') ?>
    <h1>Se connecter</h1>
    <form action="log_user.php" method="post">
        <div>
            <label for="pseudo">Nom d'utilisateur :</label>
            <input type="text" id="pseudo" name="pseudo">
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="text" id="password" name="password">
        </div>
        <button>Login</button>
    </form>
</body>

</html>