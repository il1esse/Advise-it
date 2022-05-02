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
            </div>
        </div>
    </nav>
    <!--Fin de la barre de navigation-->

</body>

</html>

<?php
require_once 'config.php';
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: connexion.php");
    exit(); 
  }
function csvToArray($csvFile){
 
    $file_to_read = fopen($csvFile, 'r');
 
    while (!feof($file_to_read) ) {
        $lines[] = fgetcsv($file_to_read, 1000, ',');
 
    }
 
    fclose($file_to_read);
    return $lines;
}
 
//read the csv file into an array

if ($_SESSION['username'] == 'user1')
{
    $csvFile = '../csv/top100.csv';
}else if ($_SESSION['username'] == 'user2')
{
    $csvFile = '../csv/top100_usr2.csv';
}else
{
    $csvFile = '../csv/top100_usr3.csv';
}
    $csv = csvToArray($csvFile);
    

    echo '<br />';
    echo '<br />';
    echo '<br />';

    for($i=0; $i<100; $i++)
    {
        $a = $csv[$i][0];


        $request= "SELECT title,overview,datee,poster_path FROM movie WHERE idmovie='$a'";

        $result = mysqli_query($conn, $request);
        while ($donnees = mysqli_fetch_all($result,MYSQLI_ASSOC))
        {
        echo "<table class='table table-striped table-bordered'>
                    <tr><td>Titre :</td><td>".$donnees[0]["title"]."</td></tr>
                    <tr><td>Description :</td><td>".$donnees[0]["overview"]."</td></tr>
                    <tr><td>Date :</td><td>".$donnees[0]["datee"]."</td></tr>
                    <tr><th colspan='2'> <img src='https://image.tmdb.org/t/p/w500".$donnees[0]['poster_path']." ' height='100' width='100'></th> </tr>
                </table>";
        echo '<br />';
        }
        

    }
?>



