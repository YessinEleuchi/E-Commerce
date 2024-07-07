<?php
session_start();
if (isset( $_SESSION['nom'] )) {
    header('Location: profile.php');
}
include "../includ/functions.php";

$user = true; // Assuming this is a placeholder variable

if (!empty($_POST)) {
    $user = connectAdmin($_POST);

    if (is_array($user) && count($user)>0) {   // utilisateur connecté
       session_start();
       $_SESSION['ID']=$user['ID'];
       $_SESSION['email']=$user['email'];
       $_SESSION['nom']=$user['nom'];
       $_SESSION['mp']=$user['mp'];
  
      header('Location: profile.php'); // redirection vers page profile
        exit(); // It's a good practice to include exit() after header redirection to prevent further execution of the script
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
    <!-- Navbar -->

    <!-- fin nav-->
    <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : Connexion</h1>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= $errorMessage ?>
            </div>
        <?php endif; ?>
    </div>

    <!--footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
</body>

</html>
