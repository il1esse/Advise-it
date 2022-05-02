<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Feuilles de style-->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <title>AdviseIt</title>
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
    <input type="button" onclick="window.location.href = 'rating.php'" value="rating"/>
    <input type="button" onclick="window.location.href = 'sansrating.php'" value="sans rating"/>
</body>

</html>



