<?php
include "includ/functions.php";
session_start();
$categorie=getCategories();
if (!empty($_POST)){
    
    $produit= searchProduit($_POST['search']);}
    else {
        $produit = getProduit();
    }
    
if (!isset( $_SESSION['nom'] )) {
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>YO-SHOP</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- Navbar -->
<?php
include"includ/nav.php" ;
?>
   

    <!-- SECTION -->
		<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <?php
                        if (isset($_SESSION['nom'])) {
                            echo '<div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">';
                            foreach ($produit as $product) {
                                echo '
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="img/' . $product['image'] . '" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">' . $product['Nom'] . '</p>
                                            <h4 class="product-price">' . $product['Prix'] . ' DT</h4>
                                            <div class="product-rating"></div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter aux favoris</span></button>
                                                <button class="quick-view"><a href="produit.php?id=' . $product['ID'] . '"><i class="fa fa-eye"></i></a><span class="tooltipp">Afficher le détail</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier </button>
                                        </div>
                                    </div>
                                    <!-- /product -->';
                            }
                            echo '</div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>';
                        } else {
                            header('Location: connexion.php');
                        }
                        ?>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

		<!-- /SECTION -->
   <?php  include"includ/footer.php"
   ?>
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    

</html>