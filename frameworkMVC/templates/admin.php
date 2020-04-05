<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>


   
<head>
	<title>Pannel Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	<script src="jquery-3.4.1.min.js"></script>
	<script src="jquery-lib.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
	<br>
	<div class="row text-center mt-5 w-75 mb-5" style="margin:auto">
		<div class="col-4">
			<hr class="w-50">
		</div>
		<div class="col-4">
			<p class="h4 text-center">Pannel Administrateur</p>
		</div>
		<div class="col-4">
			<hr class="w-50">
		</div>
	</div>
	<center>
	<div class="container">
  		<div class="row">
    		<div class="col">
      			<input style="margin-bottom:50px;"type="button" class='btn btn-secondary btn-lg btn-block' onclick="location.href='index.php?view=pannelG'" value='Cliquez ici pour gérer votre galerie.'/>
    		</div>
    		<div class="col">
      			<input style="margin-bottom:50px;" type="button" class='btn btn-secondary btn-lg btn-block' onclick="location.href='index.php?view=pannelC'" value='Cliquez ici pour gérer les commentaires.'/>
    		</div>
  		</div>
  	</div>
  </center>
</body>
