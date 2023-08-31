<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Portail de Location de Motos | Détails de la Page</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!-- Style personnalisé -->
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<!-- Slider Owl Carousel -->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!-- Slider Slick -->
<link href="assets/css/slick.css" rel="stylesheet">
<!-- Bootstrap Slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!-- Police FontAwesome -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

<!-- Icônes Fav et touch -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
<!-- Sélecteur de couleurs -->
<?php include('includes/colorswitcher.php');?>
<!-- /Sélecteur de couleurs -->

<!-- En-tête -->
<?php include('includes/header.php');?>
<?php
$pagetype=$_GET['type'];
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh->prepare($sql);
$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        ?>
        <section class="page-header aboutus_page">
            <div class="container">
                <div class="page-header_wrap">
                    <div class="page-heading">
                        <h1><?php echo htmlentities($result->PageName); ?></h1>
                    </div>
                    <ul class="coustom-breadcrumb">
                        <li><a href="#">Accueil</a></li>
                        <li><?php echo htmlentities($result->PageName); ?></li>
                    </ul>
                </div>
            </div>
            <!-- Superposition sombre -->
            <div class="dark-overlay"></div>
        </section>
        <section class="about_us section-padding">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php echo htmlentities($result->PageName); ?></h2>
                    <p><?php echo $result->detail; ?></p>
                </div>
            <?php } }?>
            </div>
        </section>
        <!-- /À propos de nous -->

        <!-- Pied de page -->
        <?php include('includes/footer.php');?>
        <!-- /Pied de page -->

        <!-- Retour en haut -->
        <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
        <!--/Retour en haut -->

        <!-- Formulaire de connexion -->
        <?php include('includes/login.php');?>
        <!--/Formulaire de connexion -->

        <!-- Formulaire d'inscription -->
        <?php include('includes/registration.php');?>
        <!--/Formulaire d'inscription -->

        <!-- Formulaire de réinitialisation de mot de passe oublié -->
        <?php include('includes/forgotpassword.php');?>
        <!--/Formulaire de réinitialisation de mot de passe oublié -->

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/interface.js"></script>
        <!-- Sélecteur de couleurs -->
        <script src="assets/switcher/js/switcher.js"></script>
        <!-- Bootstrap Slider JS -->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!-- Slider Slick JS -->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>

    </body>

    <!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->
</html>
