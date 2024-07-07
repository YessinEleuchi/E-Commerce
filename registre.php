<?php
session_start();
// si user connecter n'a pas le droit d'acceder a page registre
if (isset( $_SESSION['nom'] )) {
    header('Location: profile.php');
}
include "includ/functions.php";
$AlerteRegistre=0;
$categorie=getCategories();
if (!empty($_POST)){
     if ( AddVisiteur($_POST)){
      $AlerteRegistre = 1;
     }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css">

</head>

<body>
  <style>
    .add-to-cart-btn {
  position: relative;
  border: 2px solid transparent;
  height: 40px;
  padding: 0 30px;
  background-color: #ef233c;
  color: #FFF;
  text-transform: uppercase;
  font-weight: 700;
  border-radius: 40px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}


 .add-to-cart-btn:hover {
  background-color: #FFF;
  color: #D10024;
  border-color: #D10024;
  padding: 0px 30px 0px 50px;
}


  </style>
    <!-- Navbar -->

    <?php
    include "includ/nav.php";
    ?>
    <!-- fin nav-->
    <div class="col-12 p-5"  >
        <h1 class="text-center ">Registre</h1>

        <form action="registre.php" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputPassword1"required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénom</label>
                <input type="text"  name="prenom" class="form-control" id="exampleInputPassword1"required>
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
              
              
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="exampleInputPassword1"required>
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot  de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1" required>
              </div>
            
            <button type="submit" class="add-to-cart-btn">Submit</button>
          </form>
    </div>

    <!--footer-->
    <?php  include"includ/footer.php"
   ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <?php 
    if ($AlerteRegistre==1){
    print "<script>
      Swal.fire({
        title: 'Félicitations ',
        text: 'Création de compte réussie.',
        icon: 'Félicitations ',
        confirmButtonText: 'ok' ,
        confirmButtonColor: '#28a745',
        timer : 2000
    });
    </script>";
  }
    ?>
    

</html>