


<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="creature_modif.php">Le bestiaire</a></li>
        <li><a href="magie.php">Les sortilèges</a></li>
        <?php
            if (isset($_SESSION['user'])) {
            echo '<li class="nav-right-welcome">Bienvenue '. $_SESSION['user']['pseudo'] . '</li>';    
            echo '<li><a href="logout.php">Se déconnecter</a></li>';
            } else {
                echo '<li><a href="log_user.php">Se connecter</a></li>';
                echo '<li><a href="creation_user.php">Créer un compte</a></li>';
                
            }
        ?>
        
        
         
    </ul>
</nav>