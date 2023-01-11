<?php
session_start();
include_once('environnement.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Accueil_Academie</title>
</head>
<body>

    <?php include_once ('nav.php'); ?>

    <h1 class="index_home">Bienvenue à l'Académie répértoriant aussi bien les créatures que vous rencontrerez <br> que les sortilèges qu'elles utiliseront contre vous</h1>


    <div class="index_img_container">
        <div>
            <h2 class="index_img_txt">Les créatures</h2>
            <img src="assets/img/creaturesbook.jpg" alt="" class="index_img">
        </div>
        <div>
            <h2 class="index_img_txt">Les sortilèges</h2>
            <img src="assets/img/spellbook.jpg" alt="" class="index_img">
        </div>
        
        
    </div>
    
</body>
</html>