<?php
session_start();
include '../../includ/functions.php';
$categories=getCategories();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN: Liste des Catégories</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css1/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css1/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">YO-ELECTRO</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link  " href="#">
                  <span data-feather="home"></span>
                  Accueil <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="liste.php">
                  <span data-feather="file"></span>
                  Catégories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../produits/listep.php">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
             <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Visiteurs
                </a>
              </li>-->
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Rapports
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link " href="../profile.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
              
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des Catégories</h1>
           
            <div>
            <a type ="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
            </div>
           
          </div>
          <div>
            <?php
            if(isset($_GET['ajout'] )&& ($_GET['ajout'])=="ok"){
              print'<div id="alerte" class="alert alert-success">

              categorie  ajoutée avec succés !

            </div>';
            }
            ?>
          <?php
            if(isset($_GET['sup'] )&& ($_GET['sup'])=="ok"){
              print'<div id="alerte" class="alert alert-success">

              categorie  supprimée avec succés !

            </div>';
            }
            ?>
            <?php
            if(isset($_GET['modif'] )&& ($_GET['modif'])=="ok"){
              print'<div  id="alerte"class="alert alert-success">

              categorie  modifiée avec succés !

            </div>';
            }
            ?>
          <table class="table">
          <script>
            setTimeout(function() {
              document.getElementById('alert').style.display = 'none';
            }, 2000);
          </script>
          
  <thead>
    <tr>
      <th scope="col">NB Catégorie</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    foreach ($categories as $categorie){
        $i++;
        print '<tr>
        <th scope="row">' . $i . '</th>
        <td>' . $categorie['Nom'] . '</td>
        <td>' . $categorie['Description'] . '</td>
        <td><a type="submit" class="btn btn-success" data-toggle="modal" data-target="#editModal' . $categorie['ID'] . '">Modifier</a></td>
        <td><a href="sup.php?idc=' . $categorie['ID'] . '" class="btn btn-danger">Supprimer</a></td>
      </tr>';

    }
    ?>
    
   
  </tbody>
</table>
   
          </div>
          
        </main>
      </div>
    </div>



    <?php
foreach ($categories as $index => $categorie) {
?>
<!-- Modal Modification-->
<div class="modal fade" id="editModal<?php echo $categorie['ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="post">
          <input type="hidden" value="<?php echo $categorie['ID']; ?>" name="ID"/>

            <div class="form-group">
                <input type="text" name="Nom" class="form-control"  value="<?php echo $categorie['Nom']; ?>" placeholder="Nom de la catégorie">
            </div>
            <div class="form-group">
                <textarea name="Description" class="form-control" placeholder="Description de la catégorie"><?php echo $categorie['Description']; ?></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
        </form>
    </div>
  </div>
</div>
<?php
}
?>



<!-- Modal Ajout-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Catégorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post">
            <div class="form-group" >
                <input type="text" name="Nom"  class="form-control " placeholder="Nom de la catégorie"  >

            </div>
            <div class="form-group" >
                <textarea name="Description"  class="form-control" placeholder="Description de la catégorie"></textarea>

            </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
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
    <script src="../../js1/vendor/popper.min.js"></script>
    <script src="../../js1/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
   
  </body>
</html>
