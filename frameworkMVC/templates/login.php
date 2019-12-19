<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Forms</title>
	<meta name="viewport" width="device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<style>

        form{
            background-color: white;
			border-radius: 20px;
			border: 1.5px solid black;
        }

		label{
			font-size:80%;
		}

		input{
			margin:auto;
		}

		input[type="submit"]{
			font-size:90%;	
		}

		input[type="text"], input[type="password"]{
			border-radius: 10px;
			border-color: lightgrey;
			font-size: 80%;
		}

		div.container{
			max-width: 60vw;
		}

		label{margin-left:12.5%}

		small{font-size:60%}

		div+p{
			font-size: 65%;
		}


	</style>
</head>

<body>

	<div class="row text-center mt-5 w-75" style="margin:auto">
		<div class="col-4">
			<hr class="w-50">
		</div>
		<div class="col-4">
			<p class="h4 text-center">Formulaires d'authentification</p>
		</div>
		<div class="col-4">
			<hr class="w-50">
		</div>
	</div>

	<div class='container'>
		<div class='row justify-content-between'>
			<!-- Formulaire de connexion -->
			<form class='form col-md-4' style="height:90%;margin-top:25vh">
				<p class='h5 text-dark text-center mt-3'>Connexion</p>
				<div class='form-group mt-4'>
					<label for='mail' id='labelMail' class='text-center'>Adresse mail</label>
					<input id='mail' class='form-control w-75' type="text" value=""/>
				</div>
				<div class='form-group'>
					<label for='pwd'>Mot de passe</label>
					<input id='pwd' class='form-control w-75' type="password" maxlength="20" value=""/>
				</div>
				<div class='form-group'>
					<label for='connected'><input type="checkbox"/></label>
					<span id='connected' style="font-size:70%" class="">Rester connecté</span>
				</div>	
				<input class='btn btn-primary btn-block w-75 mt-4 mb-3 text-light bg-dark' type='submit' value='Se connecter' />
			</form>

			<div id="verticalLine"></div>

			<!-- Formulaire d'inscription -->
			<form class='form col-md-5 mb-5' style="height:90%;margin-top:15vh">
				<p class='h5 text-dark text-center mt-3'>Inscription</p>
				<div class='form-group mt-4'>
					<label for='nomSU'>Nom *</label>
					<input id='nomSU' class='form-control w-75' type="text" value=""/>
					<small id="nomHelp" class="form-text text-muted text-center"></small>
				</div>
				<div class='form-group'>
					<label for='prenomSU'>Prénom *</label>
					<input id='prenomSU' class='form-control w-75' type="text" value=""/>
					<small id="prenomHelp" class="form-text text-muted text-center"></small>
				</div>
				<div class='form-group'>
					<label for='mailSU'>Adresse mail *</label>
					<input id='mailSU' class='form-control w-75' type="text" value=""/>
					<small id="emailHelp" class="form-text text-muted text-center"></small>
				</div>
				<div class='form-group'>
					<label for='pwdSU'>Mot de passe *</label>
					<input id='pwdSU' class='form-control w-75' type="text" maxlength="20" value=""/>
					<small id="pwdHelp" class="form-text text-muted text-center">Entre 6 et 20 caractères.</small>
				</div>
				<div class='form-group'>
					<label for='numSU'>Numéro de téléphone</label>
					<input id='numSU' class='form-control w-75' type="text" maxlength="10" value=""/>
					<small id="numHelp" class="form-text text-muted text-center"></small>
				</div>
				<p class="font-italic mt-4 text-center">* champs obligatoires</p>
				<input class='btn btn-success btn-block mt-4 mb-3 w-75 text-light bg-dark' type='submit' value="S'inscrire" />
			</form>
		</div>
	</div>

	<script src="./js/signInForm.js"></script>
	<script src="./js/signUpForm.js"></script>

</body>
</html>