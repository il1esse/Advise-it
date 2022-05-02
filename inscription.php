<?php
require('config.php');
if (isset($_REQUEST['pseudo'], $_REQUEST['mdp'], $_REQUEST['confirmmdp'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['pseudo']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $mdp = stripslashes($_REQUEST['mdp']);
  $mdp = mysqli_real_escape_string($conn, $mdp);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $confirmmdp = stripslashes($_REQUEST['confirmmdp']);
  $confirmmdp = mysqli_real_escape_string($conn, $confirmmdp);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, mdp, confirmmdp)
              VALUES ('$username', '".hash('sha256', $mdp)."', '".hash('sha256', $confirmmdp)."' )";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <!--Import des styles-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!--Barre de navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">AdviseIt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Films</a>
                    </li>
                </ul>
                <form class="d-flex mx-1" action="inscription.php">
                    <button type="submit" class="btn btn-outline-secondary me-1">Inscription</button>
                </form>
                <form class="d-flex mx-1" action="connexion.php">
                    <button type="submit" class="btn btn-success">Connexion</button>
                </form>
            </div>
        </div>
    </nav>
    <!--Fin de la barre de navigation-->

    <!--Formulaire-->
    <div class="container mt-5">
        <!--Gestionnaire des erreurs-->
        <?php
        //errorsHandlerRegister($errInvalidPassword,$errInvalidPseudo);  
        ?>

        <form action="inscription.php" method="post">

            <!--Champ du pseudo-->
            <div class="mb-3">
                <label for="pseudo-register" class="form-label">Choisissez un pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo-register" required>
            </div>

            <!--Champ du mot de passe 1-->
            <div class="mb-3">
                <label for="password-register1" class="form-label">Choisissez un mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="password-register1" required>
            </div>

            <!--Champ du mot de passe 2-->
            <div class="mb-3">
                <label for="password-register2" class="form-label">Confirmez le mot de passe</label>
                <input type="password" name="confirmmdp" class="form-control" id="password-register2" required>
            </div>

            <!--Bouton d'inscription-->
            <button type="submit" name="valider" class="btn btn-primary">Inscription</button>
        </form>

        <!--Lien de redirection vers la page de connexion-->
        <div class="has-text-centered mt-2">
            <label for="">
                <a class="has-text-centered mt-2 has-text-success" href="connexion.php">Vous avez déjà un compte?</a>
            </label>
        </div>
    </div>
    <!--Fin du formulaire-->

</body>

</html>