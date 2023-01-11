<?php
session_start();
include_once('environnement.php');


// creaID est l'id de la créature ! Comme le SELECT prend tout il aurait plusieurs ID, maintenant c'est spécifié ce que je récupère
$request = $db->query('SELECT *, c.id AS creaID
                    FROM creature AS c
                    INNER JOIN users AS u ON c.users_id = u.id');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Académie</title>
</head>
<body>

    <?php include_once ('nav.php'); ?>

    <?php
            if (isset($_SESSION['user']['pseudo'])) {
            echo '<h2>Bienvenue ' . $_SESSION['user']['pseudo'] . '</h2>';
            }
            
            
            
    ?>

    <h1>Référencement de l'académie de magie</h1>
    <div class="button1" >
        <button><a href="creation_creature.php">Ajouter</a></button>
    </div>
    <section class="creature_container">
    <?php while($creature = $request->fetch()){  ?>
        
        <article>
            <img class="imgIndex" src="assets/img/<?= $creature['image']; ?>" alt="image de <?= $creature['name'];?>">   
            <p><strong>Créatures :</strong> <?= $creature['name']; ?></p>
            <p><strong>Auteur :</strong> <?= $creature['pseudo']; ?></p>
            <p><strong>Description :</strong> <?= $creature['description']; ?></p>
            <div class="button1">
                <button><a href="<?= 'creature_modif.php?id='.$creature['creaID'];?>">Modifier</a></button>
                <?php 
                var_dump($creature['creaID']);
                    // Vérif de si les variables existent + définies et non nulles, et vérif si valeurs égales ou pas
                    // Compare valeurs de creature[pseudo] à $_SESSION[user][pseudo]
                    if (isset($creature['pseudo']) && isset($_SESSION['user']['pseudo']) && $creature['pseudo'] == $_SESSION['user']['pseudo']) {
                        echo '<button><a href="delete.php?id='.$creature['creaID'] .'">Supprimer</a></button>';
                    }
                ?>
            </div>
            
        </article>
        
        

    <?php } ?>
    </section>
</body>
</html>