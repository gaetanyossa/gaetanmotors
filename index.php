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
<title>Portail de Location de Moto</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Début du Sélecteur de Couleurs -->
<?php include('includes/colorswitcher.php');?>
<!-- /Sélecteur de Couleurs -->

<!--En-tête-->
<?php include('includes/header.php');?>
<!-- /En-tête -->

<!-- Bannières -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Trouvez Votre Moto Parfaite</h1>
            <p>Nous avons plus d'un millier de motos parmi lesquelles choisir.</p>
            <a href="#" class="btn">En savoir plus <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Bannières -->

<!-- Catégories Récemment Ajoutées -->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Trouvez la Meilleure <span>Moto Pour Vous</span></h2>
      <p>Vous pourrez pleinement profiter de vos vacances et de votre balade ! Un problème ? Notre équipe passionnée sera ravie de vous aider !! Aucune perte de temps pendant vos vacances à chercher un point de location sur place ! Plus de barrière linguistique, grâce à notre équipe multilingue ! Au même prix que vous paieriez sur place ! Nous avons les meilleures motos avec les meilleures offres.</p>
    </div>
    <div class="row">

      <!-- Onglets de Navigation -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Nouvelle Moto</a></li>
        </ul>
      </div>
      <!-- Motos Récemment Ajoutées -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

<?php
$sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 FROM tblvehicles JOIN tblbrands ON tblbrands.id=tblvehicles.VehiclesBrand";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if ($query->rowCount() > 0) {
  foreach ($results as $result) {
?>

<div class="col-list-3">
<div class="recent-car-list">
<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
<ul>
<li><i class="fa fa-motorcycle" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Modèle</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> places</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<span class="price">$<?php echo htmlentities($result->PricePerDay);?> /Jour</span>
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview, 0, 70);?></p>
</div>
</div>
</div>
<?php
  }
}
?>
      </div>
    </div>
  </div>
</section>
<!-- /Catégories Récemment Ajoutées -->

<!-- Faits Amusants -->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Années d'Expérience</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle" aria-hidden="true"></i>1000+</h2>
            <p>Nouvelles Motos en Vente</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle" aria-hidden="true"></i>999+</h2>
            <p>Motos d'Occasion en Vente</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>850+</h2>
            <p>Clients Satisfaits</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Superposition Foncée -->
  <div class="dark-overlay"></div>
</section>
<!-- /Faits Amusants -->

<!-- Témoignages -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Avis de Nos Clients <span>Satisfaits</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php
$tid = 1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName FROM tbltestimonial JOIN tblusers ON tbltestimonial.UserEmail=tblusers.EmailId WHERE tbltestimonial.status=:tid";
$query = $dbh->prepare($sql);
$query->bindParam(':tid', $tid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if ($query->rowCount() > 0) {
  foreach ($results as $result) {
?>
        <div class="testimonial-m">
          <div class="testimonial-img"> <img src="assets/images/cat-profile.png" alt="" /> </div>
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
<?php
  }
}
?>
      </div>
    </div>
  </div>
  <!-- Superposition Foncée -->
  <div class="dark-overlay"></div>
</section>
<!-- /Témoignages -->

<!-- Pied de Page -->
<?php include('includes/footer.php');?>
<!-- /Pied de Page -->

<!-- Retour en Haut -->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!-- /Retour en Haut -->

<!-- Formulaire de Connexion -->
<?php include('includes/login.php');?>
<!-- /Formulaire de Connexion -->

<!-- Formulaire d'Inscription -->
<?php include('includes/registration.php');?>

<!-- /Formulaire d'Inscription -->

<!-- Formulaire de Mot de Passe Oublié -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!-- Sélecteur de Couleurs -->
<script src="assets/switcher/js/switcher.js"></script>
<!-- bootstrap-slider-JS -->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!-- Slider-JS -->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
