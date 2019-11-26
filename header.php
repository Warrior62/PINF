<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<!-- Liaisons aux fichiers css de Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
    <style>

        html{
            height : 100%;
        }
        body{
            height : 100%;
        }

        .fit-image{
        width: 100%;
        object-fit: cover;
        height: 300px; /* only if you want fixed height */
        }

        .jumbotron {
         background: url('ressources/backgroundAccueil1.jpg') center no-repeat;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          max-height:100%;
         }
         </style>
</head>
<!-- **** F I N **** H E A D **** -->

<body>
<!-- **** B O D Y **** -->
<div id="background" class="jumbotron pt-1">
<nav class="navbar sticky-top navbar-expand-lg static-top pl-4 pr-2 h-25">
    <img src="images/logo.jpg" class="mb-auto" style="width:15%">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mb-auto" id="navbarResponsive">
        <ul class="navbar-nav mr-auto" id="listeBouton">
            <li class="nav-item  ml-1 <?php if (!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view']=='accueil'))
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=accueil">Accueil
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item ml-1 <?php if (isset($_GET['view']) && $_GET['view']=='defis')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=defis">Défis</a>
            </li>
            <li class="nav-item ml-1 <?php if (isset($_GET['view']) && $_GET['view']=='classement')
            {
                echo('active');
            }
            ?>">
                <a class="nav-link text-light" href="index.php?view=classement">Classement</a>
            </li>
            <?php if (isset($_SESSION['connecte']) && $_SESSION['connecte']==true ){
                echo('
                <li class="nav-item ml-1');
                if (isset($_GET['view']) && $_GET['view']=='compte')
                {
                    echo('active');
                }
                echo('">
                    <a class="nav-link text-light" href="index.php?view=compte">Mon compte</a>
                </li>');
                if (isAdmin($_SESSION['id'])==1) {
                    echo('
                <li class="nav-item ml-1');
                    if (isset($_GET['view']) && $_GET['view'] == 'admin') {
                        echo('active');
                    }
                    echo('">
                    <a class="nav-link text-light" href="index.php?view=admin">Administrer</a>
                    </li>');
                }
                echo('
                <li class="nav-item ml-1">
                    <a class="nav-link text-light" href="controleur.php?action=deconnecter&mail='.$_SESSION['email'].'">Se déconnecter</a>
                </li>');
            }
            else {
                echo('
                <li class="nav-item ml-1 float-right');
                if (isset($_GET['view']) && $_GET['view']=='login')
                {
                    echo('active');
                }
                echo('">
                    <a class="nav-link text-light " href="index.php?view=login">Connexion</a>
                </li>
                <li class="nav-item ml-1');
                if (isset($_GET['view']) && $_GET['view']=='inscrire')
                {
                    echo('active');
                }
                echo('">
                    <a class="nav-link text-light" href="index.php?view=inscrire">S\'inscrire</a>
                </li>');
            }
            ?>
        </ul>
    </div>
</nav>
</div>


</body>






