<?php
session_start();
include_once('environnement.php');


if(isset($_POST['name']) && isset($_POST['description'])) {
    $name = htmlspecialchars($_POST['name']) ;
    $description = htmlspecialchars($_POST['description']) ;

    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($imageTmp, 'assets/img/' . $image);
    }

    
    

    $rqAdd = $db->prepare('INSERT INTO creature (name, description, image, users_id)
                        VALUES (?, ?, ?, ? )');

    $rqAdd->execute(array($name,$description, $image, $_SESSION['user']['id']));
    header('Location: index.php?success=3');                         
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

<form action="creation_creature.php" method="POST" enctype="multipart/form-data">
        
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" class="modif_name" >
    <label for="description">Ajouter une description :</label>
    <textarea name="description" id="description" cols="30" rows="10" 
    class="modif_creature" ></textarea>
    <input type="file" name="image" id="image"> 
    <button >Ajouter</button>      
</form>
    
    

</body>
</html>