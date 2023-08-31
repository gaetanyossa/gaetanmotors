<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Portail de Location de Moto | Liste des Motos</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Style Personnalisé -->
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<!--Slider Owl Carousel -->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--Slider slick -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--Bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--Style de Police FontAwesome -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

<!-- Icônes Fav et tactiles -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Démarrer le Sélecteur de Couleurs -->
<?php include('includes/colorswitcher.php');?>
<!-- /Sélecteur de Couleurs -->

<!--En-tête-->
<?php include('includes/header.php');?>
<!-- /En-tête -->

<!--En-tête de la Page-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Liste des Motos</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Accueil</a></li>
        <li>Liste des Motos</li>
      </ul>
    </div>
  </div>
  <!-- Superposition Sombre -->
  <div class="dark-overlay"></div>
</section>
<!-- /En-tête de la Page -->

<!--Liste-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
<?php
// Requête pour le Comptage des Annonces
$sql = "SELECT id FROM tblvehicles";
$query = $dbh->prepare($sql);
$query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = $query->rowCount();
?>
<p><span><?php echo htmlentities($cnt);?> Annonces</span></p>
</div>
</div>

<?php
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="Image" /> </a>
          </div>
          <div class="product-listing-content">
            <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
            <p class="list-price">$<?php echo htmlentities($result->PricePerDay);?> Par Jour</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> places</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>Modèle <?php echo htmlentities($result->ModelYear);?></li>
              <li><i class="fa fa-motorcycle" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">Voir les Détails <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
<?php
  }
}
?>
         </div>

      <!--Barre Latérale-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Trouvez Votre Moto </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand">
                  <option>Sélectionner la Marque</option>

                  <?php
                  $sql = "SELECT * FROM tblbrands ";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                  ?>
                  <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
                  <?php
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" name="fueltype">
                  <option>Sélectionner le Type de Carburant</option>
                  <option value="Essence">Essence</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Gaz Naturel">Gaz Naturel</option>
                </select>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Rechercher une Moto</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-motorcycle" aria-hidden="true"></i> Motos Récemment Annoncées</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
<?php
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id=tblvehicles.VehiclesBrand ORDER BY id DESC LIMIT 4";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
  foreach ($results as $result) {
?>
              <li class="gray-bg">
                <div class="recent_post_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                <div class="recent_post_title"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a>
                  <p class="widget_price">$<?php echo htmlentities($result->PricePerDay);?> Par Jour</p>
                </div>
              </li>
<?php
  }
}
?>
            </ul>
          </div>
        </div>
      </aside>
      <!--/Barre Latérale-->
    </div>
  </div>
</section>
<!-- /Liste-->

<!--Pied de Page -->
<?php include('includes/footer.php');?>
<!-- /Pied de Page -->

<!--Retour en Haut-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Retour en Haut-->

<!--Formulaire de Connexion -->
<?php include('includes/login.php');?>
<!--/Formulaire de Connexion -->

<!--Formulaire d'Inscription -->
<?php include('includes/registration.php');?>

<!--/Formulaire d'Inscription -->

<!--Formulaire de Mot de Passe Oublié -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
