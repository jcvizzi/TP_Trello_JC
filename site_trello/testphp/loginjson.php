<?php
    $filename_user = "identifiantsjson.txt";
    $login = file_get_contents($filename_user);/* appel de fonction pour lire le contenu du fichier*/
    $user_tab = json_decode($login, true);
   
/*var_dump($user_tab); permet d'afficher avec plus d'info que echo "exit" coupe le code
exit();*/
    $message = "";
    
    if(isset($_POST['login']) && isset($_POST['mdp'])) { /* isset permet de determiner si une variable est pas vide*/
        if($_POST['login'] === $user_tab["identifiant"] && $_POST['mdp'] === $user_tab["password"]) {
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
    <form action="loginjson.php" method="post">
        <input type="text" name="login" placeholder="Identifiant">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" value="Connexion">
    </form>
    
    <?php } else { ?>
    
    <div style=" border: 1px solid blue;">Authentification réussie</div>
    
    <?php } ?>
</body>
    
</html>
