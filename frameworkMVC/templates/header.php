<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
include_once "libs/modele.php";
?>
<!DOCTYPE html "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<!-- Liaisons aux fichiers css de Bootstrap -->
  <link rel="stylesheet" href="./css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="./css/jcarousel.responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="./js/jquery.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/jquery.jcarousel.js"></script>
  <script type="text/javascript" src="./js/jcarousel.responsive.js"></script>

    <style>

        html{
            height : 100%;
        }


        .wrapper {
            min-height: 100%;
            height: 100%;
            margin: 0 auto -115px; /* the bottom margin is the negative value of the footer's height */
        }
        .footer, .push {
            height: 155px; /* .push must be the same height as .footer */
        }

        .jumbotron {
          background: url('ressources/backgroundAccueil1.jpg') center no-repeat;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          max-height:100%;
         }

        .jcarousel img {
            display: block;
            max-width: 100%;
            height: auto !important;
        }
        .star-rating {
            line-height:32px;
            font-size:1.25em;
        }

        .star-rating .fa-star{color: orange;}
         </style>
</head>
<!-- **** F I N **** H E A D **** -->

<body>
<!-- **** B O D Y **** -->
<div id="background" class="jumbotron pt-1">
<nav class="navbar sticky-top navbar-dark bg-inverse navbar-expand-lg static-top pl-4 pr-2 h-25">
    <div style="width:15%">
    <a href="index.php?view=accueil" ><img src="images/logo.gif" class="mb-auto" style="width:100%;margin-top: -30px"></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon" ></span>
    </button>
    <div class="collapse navbar-collapse mb-auto" id="navbarResponsive">
        <ul class="navbar-nav mr-auto" id="listeBouton">

            <li class="nav-item m-1 btn btn-outline-secondary <?php if (isset($_GET['view']) && $_GET['view']=='galerie')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=galerie">Galerie</a>
            </li>
            <li class="nav-item m-1 btn btn-outline-secondary <?php if (isset($_GET['view']) && $_GET['view']=='contact')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=contact">Contact</a>
            </li>
						<li class="nav-item m-1 btn btn-outline-secondary <?php if (isset($_GET['view']) && $_GET['view']=='myJewels')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=myJewels">Mes bijoux</a>
            </li>
            <li class="nav-item m-1 btn btn-outline-secondary <?php if (isset($_GET['view']) && $_GET['view']=='reparerMonBijoux')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=reparationsBijoux">Réparer mon bijou</a>
            </li>
            <?php if (isset($_SESSION["connecte"]) && $_SESSION["connecte"] ) {
                echo('
                <li class="nav-item m-1 btn btn-outline-secondary ');
                if (isset($_GET['view']) && $_GET['view'] == 'admin') {
                    echo('active');
                }
                if ( isAdmin($_SESSION['passe']) ) {
                    echo('\">
                    <a class="nav-link text-light" href="index.php?view=admin">Administrer</a>
                    </li>');
                }


                    echo('
                <li class="nav-item m-1 btn btn-outline-secondary">
                    <a class="nav-link text-light" href="controleur.php?action=Logout">Se déconnecter</a>
                </li>');

            }
            else {

                    echo('
                <li class="nav-item m-1 btn btn-outline-secondary float-right');
                    if (isset($_GET['view']) && $_GET['view'] == 'login') {
                        echo('active');
                    }
                    echo('">
                    <a class="nav-link text-light " href="index.php?view=login">Connexion / Inscription</a>
                </li>');

            }
            ?>
        </ul>
    </div>
</nav>
</div>
