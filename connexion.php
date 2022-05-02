<?php
require('config.php');
session_start();
if (isset($_POST['pseudo'])){
  $username = stripslashes($_REQUEST['pseudo']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['mdp']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and mdp='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>
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
        <form action="connexion.php" method="post">

            <!--Gestionnaire des erreurs-->
            <?php //errosHandlerLogin($errLogin); 
            ?>

            <!--Champ du pseudo-->
            <div class="mb-3">
                <label for="pseudo-login" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo-login" required>
            </div>

            <!--Champ du mot de passe-->
            <div class="mb-3">
                <label for="password-login" class="form-label">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="password-login" required>
            </div>

            <!--Bouton de connexion-->
            <button type="submit" name="valider" class="btn btn-primary">Connexion</button>
        </form>

        <!--Lien de redirection pour créer un compte-->
        <div class="has-text-centered mt-2">
            <label for="">
                <a class="has-text-centered mt-2 has-text-success" href="inscription.php">Vous n'avez pas encore de compte?</a>
            </label>
        </div>
    </div>
    <!--Fin du formulaire-->
</body>

</html>