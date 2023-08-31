<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>MotosPourVous - Modèle HTML5 de Concessionnaire de Motos Réactif</title>
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
<!-- Police Google -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim et Respond.js IE8 supportent les éléments HTML5 et les requêtes multimédias -->
<!-- ATTENTION : Respond.js ne fonctionne pas si vous visualisez la page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Début du sélecteur -->
<?php include('includes/colorswitcher.php');?>
<!-- /Sélecteur -->

<!-- En-tête -->
<?php include('includes/header.php');?>
<!-- En-tête -->

<!-- En-tête de la page -->
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Mes Réservations</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li>Mes Réservations</li>
            </ul>
        </div>
    </div>
    <!-- Superposition sombre -->
    <div class="dark-overlay"></div>
</section>
<!-- /En-tête de la page -->

<?php
$useremail = $_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        ?>
        <section class="user_profile inner_pages">
            <div class="container">
                <div class="user_profile_info gray-bg padding_4x4_40">
                    <div class="upload_user_logo">
                        <img src="assets/images/logo-concessionnaire.jpg" alt="image">
                    </div>

                    <div class="dealer_info">
                        <h5><?php echo htmlentities($result->FullName); ?></h5>
                        <p><?php echo htmlentities($result->Address); ?><br>
                            <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country); } ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <?php include('includes/sidebar.php'); ?>
                    </div>

                    <div class="col-md-6 col-sm-8">
                        <div class="profile_wrap">
                            <h5 class="uppercase underline">Mes Réservations</h5>
                            <div class="my_vehicles_list">
                                <ul class="vehicle_listing">
                                    <?php
                                    $useremail = $_SESSION['login'];
                                    $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                            ?>
                                            <li>
                                                <div class="vehicle_img">
                                                    <a href="details-vehicule.php?vhid=<?php echo htmlentities($result->vid); ?>"><img src="admin/img/images-vehicules/<?php echo htmlentities($result->Vimage1); ?>" alt="image"></a>
                                                </div>
                                                <div class="vehicle_title">
                                                    <h6><a href="details-vehicule.php?vhid=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                                                    <p><b>Date de Début :</b> <?php echo htmlentities($result->FromDate); ?><br /> <b>Date de Fin :</b> <?php echo htmlentities($result->ToDate); ?></p>
                                                </div>
                                                <?php if ($result->Status == 1) { ?>
                                                    <div class="vehicle_status">
                                                        <a href="#" class="btn outline btn-xs active-btn">Confirmé</a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                <?php } elseif ($result->Status == 2) { ?>
                                                    <div class="vehicle_status">
                                                        <a href="#" class="btn outline btn-xs">Annulé</a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="vehicle_status">
                                                        <a href="#" class="btn outline btn-xs">Pas encore confirmé</a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                <?php } ?>
                                                <div style="float: left">
                                                    <p><b>Message :</b> <?php echo htmlentities($result->message); ?> </p>
                                                </div>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Mes Véhicules-->
        <?php include('includes/footer.php'); ?>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/interface.js"></script>
        <!-- Sélecteur -->
        <script src="assets/switcher/js/switcher.js"></script>
        <!-- Bootstrap Slider JS -->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!-- Slider Slick JS -->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
    </body>
</html>
<?php } ?>
