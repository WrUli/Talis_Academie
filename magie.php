<!-- SELECT sorts.id, sorts.name, sorts.description, type_magie.nom_type_magie
FROM sorts
INNER JOIN type_magie ON sorts.spell_type = type_magie.id; -->


<?php
session_start();
include_once('environnement.php');

$sqlMagie = "SELECT sorts.id, sorts.name, sorts.description, type_magie.nom_type_magie
             FROM sorts
             INNER JOIN type_magie ON sorts.spell_type = type_magie.id;";

$requestMagie = $db->prepare($sqlMagie);
$requestMagie->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Magie</title>
</head>
<body>

    <?php include_once ('nav.php'); ?>

    <h1>Les différents sortilèges</h1>

    <div class="articles-container">
        <?php while($sort = $requestMagie->fetch()) { ?>
            <div class="article">
                <h2><strong>Sort :</strong> <?= $sort['name']; ?></h2>
                <p> <strong>Description :</strong> <?= $sort['description']; ?></p>
                <p> <strong>Type de magie :</strong> <?= $sort['nom_type_magie']; ?></p>
            </div>
        <?php } ?>
    </div>


    <form action="magie.php" method="POST">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" class="modif_name">
        <label for="description">Description :</label>
        <textarea id="description" name="description" class="modif_creature"></textarea>
        <label for="spell_type">Type de magie :</label>
        <select id="spell_type" name="spell_type" class="modif_creature">
            <option value="1">Feu</option>
            <option value="2">Glace</option>
            <option value="3">Divin</option>
        </select>
        <button>Ajouter</button>
    </form>



</body>
</html>






 