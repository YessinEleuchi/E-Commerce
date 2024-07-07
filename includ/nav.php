
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
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
    <!-- HEADER -->
<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
			</ul>
			<ul class="header-links pull-right">
				<?php if (isset($_SESSION['nom'])): ?>
					<li><a href="profile.php"><i class="fa fa-user-o"></i> Profile</a></li>
					<li><a href="deconnexion.php"><i class="fa fa-user-o"></i> Déconnexion</a></li>
				<?php else: ?>
					<li><a href="connexion.php"><i class="fa fa-user-o"></i> Connexion</a></li>
					<li><a href="registre.php"><i class="fa fa-user-o"></i> Registre</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<div class="container">
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
                    <?php  if (isset( $_SESSION['nom'] )) {
						print '<a href="index.php" class="logo">
							<img src="./img/logo.png" alt="">
						</a>';
                    }else{
                        print '<a href="connexion.php" class="logo">
							<img src="./img/logo.png" alt="">
						</a>';
                    }?>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<?php if (isset($_SESSION['Nom'])): ?>
							<form action="index.php" method="POST">
                                <!-- a refaire All Categories -->
								<select class="input-select">
									<option value="0">Catégories</option>
									<?php foreach ($categorie as $categorie): ?>
										<option value="1"><?= $categorie['Nom'] ?></option>
									<?php endforeach; ?>
								</select>
                                <!-- a refaire All Categories -->
								<input class="input" placeholder="Rechercher ici" name="search">
								<button class="search-btn">Recherche</button>
							</form>
						<?php endif; ?>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						

						<!-- Menu Toogle -->
						<!-- <div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div> -->
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
		</div>
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>