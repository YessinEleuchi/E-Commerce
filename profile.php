<?php
session_start();

include "includ/functions.php";
$categorie=getCategories();



//s'il n'est pas coonecter impossible d'acceder à la page profile
if (!isset( $_SESSION['nom'] )) //test s'il n'y a pas de user connecter
 {
    header('Location: connexion.php');
}
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php
include"includ/nav.php" ;
?>
<body>
    <div class="container">
    <h1>Bienvenu <span class="text-primary"><?php  echo $_SESSION['nom']." ".$_SESSION['prenom']  ;   ?> </span></h1>
    </div>
    <?php  include"includ/footer.php"
   ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</html>