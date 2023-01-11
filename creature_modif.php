<?php
include_once('environnement.php');

$articleId = $_GET['id'];

$rqSelect = $db->prepare(('SELECT *
                           FROM creature
                           WHERE id = ?'));
$rqSelect->execute(array($articleId));

if(isset($_POST['name']) && isset($_POST['description'])) {
    $name = htmlspecialchars($_POST['name']) ;
    $description = htmlspecialchars($_POST['description']) ;

    $request = $db->prepare('UPDATE creature
                             SET name = ?, description = ?
                             WHERE id = ? ');

    $request->execute(array($name,$description, $articleId));
    header('Location: index.php?success=1');                         
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Modification de la créature</title>
</head>
<body>

    <?php include_once ('nav.php'); ?>
    <h1>Modification de la créature</h1>

    <form action="creature_modif.php<?='?id='.$articleId ?>" method="POST">
        <?php while($value=$rqSelect->fetch()) : ?>
            <label for="name">Modifier le nom :</label>
            <input type="text" id="name" name="name" class="modif_name" value="<?=$value['name']?>">
            <label for="description">Modifier la description :</label>
            <textarea name="description" id="description" cols="30" rows="10" 
            class="modif_creature" ><?=$value['description']?></textarea>
        <?php endwhile ?>
            <button>Modifier</button>
            
    </form>
    
</body>
</html>