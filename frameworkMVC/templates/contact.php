<?php session_start(); ?>
<head>
    <title>Contact</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
	<style>
			#mapid{
				display: block;
				margin:0 auto;
				background-color:lightgrey;
				align-items: center;
			}
			#formulaire
			{
				margin-top:2%;
				margin-left:3%;
				padding: 0 2% 0 2%;
				border: 1px solid #DCDCDC;
				border-radius: 1%;
			}
			#map{
				margin-top:2%;
			}
	</style>
</head>
	<div class="row text-center mt-5 w-75" style="margin:auto">
		<div class="col-4">
			<hr class="w-50">
		</div>
		<div class="col-4">
			<p class="h4 text-center">Nous contacter !</p>
		</div>
		<div class="col-4">
			<hr class="w-50">
		</div>
	</div>
	<br /><br /><br />
	<h id="texte" class="ml-5">Pour obtenir des informations supplémentaires, veuillez nous contacter en remplissant le formulaire ci-dessous.</h><br>
	<?php
        $flag=false;
        if (isset($_SESSION["mail"])) {
            $nomEtPrenom = getNomPrenom($_SESSION['mail']);
            $flag=true;
        }
        if (isset($_GET["erreur"]) && $_GET["erreur"]==1){
            echo("<div class='text-danger ml-5'>Il y a eu une erreur.</div>");
		}
    ?>
	<div id="contenu" class="d-flex flex-row">
		<div id="formulaire" class="w-50">
			<form method="POST" action="controleur.php">
				<br>
				<div class="form-group row">
				<label for="text" class="col-md-3 col-form-label">Nom :</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="text" name="nomContact" value="<?php if ($flag) echo($nomEtPrenom[0]) ?>">
				</div>
				</div>
				<br>
				<div class="form-group row">
				<label for="text" class="col-md-3 col-form-label">Prénom :</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="text" name="prenomContact" value="<?php if ($flag) echo($nomEtPrenom[1]) ?>">
				</div>
				</div>
				<br>
				<div class="form-group row">
				<label for="text" class="col-md-3 col-form-label">Adresse Mail :</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="text" name="mailContact" value="<?php if ($flag) echo($_SESSION["mail"])?>">
				</div>
				</div>
				<br>
				<div class="form-group row">
				<label for="text" class="col-md-3 col-form-label">Sujet :</label>
				<div class="col-md-9">
					<input type="textarea" class="form-control" id="textarea" name="sujetContact">
				</div>
				</div>
				<br>
				<div class="form-group row">
				<label for="text" class="col-md-3 col-form-label">Message :</label>
				<div class="col-md-9">
					<textarea class="form-control" id="textarea" placeholder="Entrez votre message ici !" name="messageContact"></textarea>
				</div>
				</div>
                <div class="g-recaptcha"
                     data-sitekey="6Ld1yuwUAAAAAEjr6eTXxetGHnMTH0k_DHU5pgZN">
                </div>
				<br>
				<div class="form-group row">
				<div class="col">
					<input type="submit" class="btn btn-outline-secondary" name="action">
				</div>
				</div>
				<br>

			</form>
		</div>
		<div id="map" class="col-md-6">
			<iframe id="mapid" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10168.54913050332!2d2.9469967!3d50.4199138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6126dbbd680c30c!2sL&#39;atelier%20Du%20Bijoutier!5e0!3m2!1sfr!2sfr!4v1574253465572!5m2!1sfr!2sfr" width="85%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>