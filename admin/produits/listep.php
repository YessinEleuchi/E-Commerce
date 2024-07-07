<?php
session_start();
$createur = $_SESSION["ID"];

include '../../includ/functions.php';
$categories = getCategories();
$produits = getProduit();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>ADMIN: Liste des Produits</title>

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
              <a class="nav-link " href="../categories/liste.php">
                <span data-feather="file"></span>
                Catégories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="listep.php">
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
          <h1 class="h2">Liste des Produits</h1>

          <div>
            <a type="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
          </div>


        </div>
        <div>

          <?php
          if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
            echo '<div id="alert" class="alert alert-success">Produit ajoutée avec succès !</div>';
          }
          ?>

          <script>
            setTimeout(function() {
              document.getElementById('alert').style.display = 'none';
            }, 2000);
          </script>

          <?php
          if (isset($_GET['sup']) && ($_GET['sup']) == "ok") {
            print '<div id="alert" class="alert alert-success">produit supprimé avec succès !</div>';
          }
          ?>
          <?php
          if (isset($_GET['modif']) && ($_GET['modif']) == "ok") {
            print '<div  id="alert" class="alert alert-success">Produit modifiée avec succès !</div>';
          }
          ?>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">NB Produit</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($produits as $produit) {
                $i++;
                echo '<tr>
                    <th scope="row">' . $i . '</th>
                    <td>' . $produit['Nom'] . '</td>
                    <td>' . $produit['Description'] . '</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal' . $produit['ID'] . '">Modifier</button></td>
                    <td><a href="sup.php?idc=' . $produit['ID'] . '" class="btn btn-danger">Supprimer</a></td>
                  </tr>';
              }

              ?>


            </tbody>
          </table>

        </div>

      </main>
    </div>
  </div>

  <!-- Modal Modification-->
  <?php
  foreach ($produits as $produit) {
    echo '<div class="modal fade" id="editModal' . $produit['ID'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modifier le produit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="modifier.php" method="post">
                    <input type="hidden" value="' . $produit['ID'] . '" name="ID"/>
                    <div class="form-group">
                      <input type="text" name="Nom" class="form-control" value="' . $produit['Nom'] . '" placeholder="Nom du produit">
                    </div>
                    <div class="form-group">
                      <textarea name="Description" class="form-control" placeholder="Description du produit">' . $produit['Description'] . '</textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>';
  }
  ?>

  <!-- Modal Ajout-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="ajoutp.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="Nom" class="form-control" placeholder="Nom du produit">
            </div>
            <div class="form-group">
              <textarea name="Description" class="form-control" placeholder="Description du produit"></textarea>
            </div>
            <div class="form-group">
              <input type="number" step="0.01" name="Prix" class="form-control" placeholder="Prix du produit">
            </div>
            <div class="form-group">
              <input type="file" name="image" class="form-control" placeholder="Image du produit">
            </div>
            <div class="form-group">
              <select name="Categorie" id="">
                <option value="" disabled selected hidden>catégorie</option>
                <?php
                foreach ($categories as $index => $categorie) {
                  echo '<option  value="' . $categorie["ID"] . '">' . $categorie['Nom'] . '</option>';
                }
                ?>
              </select>
            </div>
            <input type="hidden" name="Createur" value="<?php echo $createur; ?>" />
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
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
