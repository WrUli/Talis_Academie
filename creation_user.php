<?php
include_once('environnement.php');



// if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['email'])) {
//     $pseudo = htmlspecialchars ($_POST['pseudo']);
//     $password = htmlspecialchars($_POST['password']);
//     $email = htmlspecialchars($_POST['email']);
//     $rqAddUser = $db->prepare('INSERT INTO users (pseudo, password, email)
//                             VALUES (?, ?, ?)');

//     $rqAddUser->execute(array($pseudo,password_hash($password, PASSWORD_DEFAULT), $email));

    
//     echo 'Le compte a été créé avec succès';
//     header('Location: index.php');
//     }else {
//       echo 'Veuillez remplir tous les champs';
//     }

// ?>

<?php
include_once('environnement.php');

if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['email'])) {
    $pseudo = htmlspecialchars ($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    
    
    $check = $db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $check->execute(array(':pseudo' => $pseudo));
    $count = $check->rowCount();
    if ($count > 0) {
        echo 'Le pseudo est déjà pris, veuillez en choisir un autre.';
    } else {
        $rqAddUser = $db->prepare('INSERT INTO users (pseudo, password, email) VALUES (?, ?, ?)');
        include_once('hashpassword.php');
        echo 'Le compte a été créé avec succès';
        header('Location: index.php');
    }
} else {
    echo 'Veuillez remplir tous les champs';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    
    <?php include_once ('nav.php'); ?>

    <form action="creation_user.php" method="post">
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button >Ajouter</button>
    </form>


</body>
</html>