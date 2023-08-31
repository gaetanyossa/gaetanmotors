<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
{
  $nom = $_POST['fullname'];
  $email = $_POST['email'];
  $numeroContact = $_POST['contactno'];
  $message = $_POST['message'];

  $sql = "INSERT INTO tblcontactusquery(nom, EmailId, ContactNumber, Message) VALUES(:nom, :email, :numeroContact, :message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':nom', $nom, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':numeroContact', $numeroContact, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();

  $lastInsertId = $dbh->lastInsertId();

  if($lastInsertId)
  {
    $msg = "Demande envoyée. Nous vous contacterons prochainement.";
  }
  else
  {
    $error = "Quelque chose s'est mal passé. Veuillez réessayer.";
  }
}
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>BikeForYou - Modèle HTML5 de Concessionnaire de Moto Réactif</title>
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

<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

.succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
</head>
<body>

<!-- Démarrer le Sélecteur de Couleurs -->
<?php include('includes/colorswitcher.php');?>
<!-- /Sélecteur de Couleurs -->

<!--En-tête-->
<?php include('includes/header.php');?>
<!-- /En-tête -->

<!--En-tête de la Page-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Nous Contacter</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Accueil</a></li>
        <li>Nous Contacter</li>
      </ul>
    </div>
  </div>
  <!-- Superposition Sombre -->
  <div class="dark-overlay"></div>
</section>
<!-- /En-tête de la Page-->

<!--Nous Contacter-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <h3>Contactez-nous en utilisant le formulaire ci-dessous</h3>
        <?php if($error){?><div class="errorWrap"><strong>ERREUR</strong>: <?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCÈS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
        <div class="contact_form gray-bg">
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Nom Complet <span>*</span></label>
              <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
            </div>
            <div class="form-group">
              <label class="control-label">Adresse Email <span>*</span></label>
              <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
            </div>
            <div class="form-group">
              <label class="control-label">Numéro de Téléphone <span>*</span></label>
              <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
            </div>
            <div class="form-group">
              <label class="control-label">Message <span>*</span></label>
              <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit">Envoyer le Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <h3>Coordonnées</h3>
        <div class="contact_detail">
          <?php
            $pagetype=$_GET['type'];
            $sql = "SELECT Address, EmailId, ContactNo FROM tblcontactusinfo";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if($query->rowCount() > 0)
            {
              foreach($results as $result)
              {
          ?>
          <ul>
            <li>
              <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
              <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
            </li>
            <li>
              <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php echo htmlentities($result->EmailId); ?></a></div>
            </li>
            <li>
              <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="mailto:kgagency@gmail.com"><?php echo htmlentities($result->ContactNo); ?></a></div>
            </li>
          </ul>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Nous Contacter -->

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
