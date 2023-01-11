<?php   
session_start();
include_once('environnement.php');

$articleId = htmlspecialchars($_GET['id']);

$rqVerif = $db->prepare(('SELECT users_id
                           FROM creature
                           WHERE id  = ?' ));
$rqVerif->execute(array($articleId));
$user_id = $rqVerif->fetch();

var_dump($user_id);
var_dump($_SESSION['user']['id']);


if(!isset($_SESSION['user']) ||  ($user_id['users_id']) != $_SESSION['user']['id'] ) {
    header('Location: index.php?error=1'); 
    exit();
}else {
    $rqDelete = $db->prepare (('DELETE FROM creature WHERE id = ?'));
    $rqDelete->execute(array($articleId));
    header('Location: index.php?success=1'); 
    exit();
}

