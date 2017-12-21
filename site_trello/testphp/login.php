<?php
    $filename_user = "identifiants.txt";
    $login = file_get_contents($filename_user); /* appel de fonction pour lire le contenu du fichier*/
    $tableauLogins = explode(" ", $login); /*on recupere les données on fait l'explosion avec l'espace*/

    $tableauLogins[1] = substr($tableauLogins[1], 0, -1); /* enlever l'espace par defaut*/

    $message = "";
    
    if(isset($_POST['login']) && isset($_POST['mdp'])) { /* isset permet de determiner si une variable est pas vide*/
        if($_POST['login'] === $tableauLogins[0] && $_POST['mdp'] === $tableauLogins[1]) {
            $isAuthentifie = true;  
        } else {
            $isAuthentifie = false;
            $message = "Ça marche pas !";
        }
    }   
?>

<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
    
<body>
    <?php if(!$isAuthentifie) {  echo $message; ?> <!--si on est pas identifier on affiche le message-->
    
    <p>Veuillez vous identifier !</p> <!--formulaire-->
    <form action="login.php" method="post">
        <input type="text" name="login" placeholder="Identifiant">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" value="Connexion">
    </form>
    
    <?php } else { ?>
    
    <div style=" border: 1px solid blue;">Authentification réussie</div>
    
    <?php } ?>
</body>
    
</html>
