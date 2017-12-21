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
            $message = "erreur d'authentification!";
        }
    }   
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Inscription FSJB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="styles/style.css" media="all" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"> <a href="#">Accueil</a> </li>
                        <li> <a href="#">facebook</a> </li>
                        <li> <a href="#">Twitter</a> </li>
                        <li> <a href="#">Références</a> </li>
                    </ul>
                    <form class="navbar-form navbar-right inline-form">
                        <div class="form-group">
                            <input type="search" class="input-sm form-control" placeholder="Recherche">
                            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <header>
            <img id="logo" src="img/logo.png" alt="logo" />
            <h1> Gestionnaire FSJ</h1>
        </header>
        <!-- <?php if(!$isAuthentifie) {  echo $message; ?> -->

        <div class="container">
            <form action="loginjson.php" method="post">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                        <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-3">
                        <div class="form-group">
                            <label for="Prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="form-group">
                            <label for="Email">Email address</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                        <div class="form-group">
                            <label for="Password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-3">
                        <div class="form-group">
                            <label for="Vpassword">Vérification mot de passe</label>
                            <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe">
                        </div>
                    </div>
                </div>
                      

                <br/>
                        
                <input id="connection" type="submit" value="S'inscrire ">
                <input id="annu" type="button" onclick="window.location.replace('chemin/vers/la/page')" value="Annuler" />

     

        <?php }
    else { ?>

        <div style=" border: 1px solid blue;">Authentification réussie</div>

        <?php } ?>
                
    </body>

    </html>
