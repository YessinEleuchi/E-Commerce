<?php
session_start();
include "../includ/functions.php";

if(isset($_POST['btnEdit'])){
    if(EditAdmin($_POST)){
      $_SESSION['nom']=$_POST['nom'];
      $_SESSION['email']=$_POST['email'];

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN: Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css1/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css1/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">YO-ELECTRO</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../deconnexion.php">Déconnexion</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="#">
                  <span data-feather="home"></span>
                  Accueil <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categories/liste.php">
                  <span data-feather="file"></span>
                  Catégories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produits/listep.php">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Visiteurs
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Rapports
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
              
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Profile</h1>
                <div>
                    <?php
                    // Affichage du nom et de l'email de l'utilisateur
                    echo $_SESSION['nom'];
                    
                    ?>
                </div>
            </div>
            <div class="container">
                <h1>Nom :  <span class="text-primary"><?php echo $_SESSION['nom'];?></span> </h1>
                <h1>Email :<span class="text-primary"><?php echo $_SESSION['email'];?></span> </h1>
                <a data-toggle="modal" data-target="#profileEdit" class="btn btn-primary">Modifier</a>
            </div>
        </main>
    </div>
</div>

<!-- Modal Modification-->
<div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="id_admin" value="<?php echo $_SESSION['ID']; ?>">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom:</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo $_SESSION['nom']; ?>" placeholder="Tappez votre nom">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="Tappez votre email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mot De Passe :</label>
                        <input type="password" name="mp" class="form-control" value="<?php echo $_SESSION['mp']; ?>" placeholder="Tappez votre mot de passe ">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../js1/vendor/popper.min.js"></script>
<script src="../js1/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
</body>
</html>
