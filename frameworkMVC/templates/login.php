<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>


<html>
<head>
	<title>Forms</title>
	<meta name="viewport" width="device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<style>
        body{
            background: url("frameworkMVC/ressources/bkgLogin.jpeg") no-repeat;
            background-size: cover;
        }

        form{
            background-color: white;
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

		div.container{
			max-width: 60vw;
		}

		label{margin-left:12.5%}

		small{font-size:60%}


	</style>
</head>

<body>
	<div class='container'>
		<div class='row justify-content-between'>
			<!-- Formulaire de connexion -->
			<form class='form col-md-4 border border-dark rounded' style="height:90%;margin-top:25vh">
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

			<!-- Formulaire d'inscription -->
			<form class='form col-md-4 border border-dark rounded' style="height:90%;margin-top:15vh">
				<p class='h5 text-dark text-center mt-3'>Inscription</p>
				<div class='form-group mt-4'>
					<label for='nom'>Nom</label>
					<input id='nom' class='form-control w-75' type="text" value=""/>
				</div>
				<div class='form-group'>
					<label for='prenom'>Prénom</label>
					<input id='prenom' class='form-control w-75' type="text" value=""/>
				</div>
				<div class='form-group'>
					<label for='mail'>Adresse mail</label>
					<input id='mail' class='form-control w-75' type="text" value=""/>
					<small id="emailHelp" class="form-text text-muted text-center">exemple: dupont@gmail.com</small>
				</div>
				<div class='form-group'>
					<label for='pwd'>Mot de passe</label>
					<input id='pwd' class='form-control w-75' type="password" maxlength="20" value=""/>
					<small id="pwdHelp" class="form-text text-muted text-center">Entre 6 et 20 caractères.</small>
				</div>
				<input class='btn btn-success btn-block mt-5 mb-3 w-75 text-light bg-dark' type='submit' value="S'inscrire" />
			</form>
		</div>
	</div>

	<script>

		var flagMail=true;
		$("#mail").click(function(){

			if( flagMail ){
				$("#labelMail").animate({"font-size": "+=1"},300);
				flagMail=false;
			} 
	
		});

	
	</script>

</body>
</html>