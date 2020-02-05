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
			width: 100%;
			margin: auto;
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
		div+p{font-size: 65%}

		#eye:hover{cursor:pointer}
	</style>
</head>

<body>

	<div class="row text-center mt-5 w-75" style="margin:auto">
		<div class="col-4">
			<hr class="w-50">
		</div>
		<div class="col-4">
			<p class="h4 text-center">Formulaire de connexion</p>
		</div>
		<div class="col-4">
			<hr class="w-50">
		</div>
	</div>

	<div class='container'>
		<div class='row'>
			<!-- Formulaire de connexion -->
			<form class='form col-md-4' style="height:90%;margin-top:10vh">
				<div class='text-center'>	
					<img src='./ressources/login.svg' class='img-fluid w-25 mt-4' />
				</div>
				<div class='form-group mt-4'>
					<label for='mail' id='labelMail' class='text-center'>Adresse mail</label>
					<input id='mail' class='form-control w-75' name="mailSI" type="text" value=""/>
				</div>
				<div class='form-group'>
					<label for='pwd'>Mot de passe</label>
					<input id='pwd' class='form-control w-75' name="pwdSI" type="password" maxlength="20" value=""/>
				</div>
				<div class='form-group'>
					<label for='connected'><input type="checkbox"/></label>
					<span id='connected' style="font-size:70%" class="">Rester connecté</span>
				</div>	
				<input class='btn btn-block w-75 mt-4 mb-3 text-light bg-dark' name='action' type='submit' value='Connexion' />
			</form>
		</div>
	</div>

	
	<script src="./js/signUpForm.js"></script>

</body>
</html>