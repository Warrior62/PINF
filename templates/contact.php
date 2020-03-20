<!DOCTYPE html>
<html lang="fr">
<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <br><h1 id="texte" style="text-align:center">Nous contacter !</h1>
    <style>
        #mapid{
            display: block;
            margin:0 auto;
            background-color:lightgrey;
            align-items: center;
        }
        #texte{
            font-family: 'Comfortaa', cursive;
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
<body>
<br><h id="texte">Pour obtenir des informations supplementaires, veuillez nous contacter en remplissant le formulaire ci-dessous.</h><br>
<div id="contenu" class="d-flex flex-row">
    <div id="formulaire" class="w-50">
        <form>
            <br>
            <div class="form-group row">
                <label for="text" class="col-md-3 col-form-label">Nom :</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="text">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-md-3 col-form-label">Prenom :</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="text">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-md-3 col-form-label">Adresse Mail :</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="text">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-md-3 col-form-label">Sujet :</label>
                <div class="col-md-9">
                    <input type="textarea" class="form-control" id="textarea">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="text" class="col-md-3 col-form-label">Message</label>
                <div class="col-md-9">
                    <textarea class="form-control" id="textarea" placeholder="Entrez votre message ici !"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col">
                    <button type="submit" class="btn btn-outline-secondary">Envoyer</button>
                </div>
            </div>
            <br>

            <!-- Penser à ajouter un capcha pour sécuriser le site des bots et des spams -->
        </form>
    </div>
    <div id="map" class="col-md-6">
        <iframe id="mapid" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10168.54913050332!2d2.9469967!3d50.4199138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6126dbbd680c30c!2sL&#39;atelier%20Du%20Bijoutier!5e0!3m2!1sfr!2sfr!4v1574253465572!5m2!1sfr!2sfr" width="85%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>
<!--	<div id="infos">
        <p id="texte"></p>
        <img src="pin.png" height="20%" width="20%" style="position:relative">Entrer l'adresse ici !<br>
    </div>-->
</body>
</html>



<!--
	if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['mail']) && isset($_GET['passe']))
					$nom = $_GET['nom'];
					$passe =$_GET['passe'];
					$mail=$_GET['mail'];
					$prenom=$_GET['prenom'];
				if($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['mail']!="" && $_GET['passe']!="") {
					if (strlen($passe)>6) {
						if (!isMail($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
							$timeTarget = 0.05; // 50 milliseconds
							$cost = 8;
							do {
								$cost++;
								$start = microtime(true);
								$encrypted_password = password_hash($passe, PASSWORD_BCRYPT, ["cost" => $cost]);
								$end = microtime(true);
							} while (($end - $start) < $timeTarget);
							$idUser = mkUser($nom, $prenom, $encrypted_password, $mail);
							mkDefisUser($idUser);
							$qs = "?view=accueil";
							if (verifUser($nom, $prenom, $idUser,$mail, $passe)) {
								// On envoie un mail de vérification
								$objet = 'Confirmation de votre réservation';
								$contenu = '
											<html>
											<head>
											   <title>Wesh c\'est un mail de confirmation</title>
											</head>
											<body>
											   <p>Bonjour Mr/Mme ' . $nom . '</p>
											   <p>Clique ici wesh</p>
											</body>
											</html>';
								$entetes =
									'Content-type: text/html; charset=utf-8' . "\r\n" .
									'From: email@domain.tld' . "\r\n" .
									'Reply-To: email@domain.tld' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
								//Envoi du mail
								mail($mail, $objet, $contenu, $entetes);
								// tout s'est bien passé, doit-on se souvenir de la personne ?
								if (valider("remember")) {
									setcookie("mail", $mail, time() + 60 * 60 * 24 * 30);
									setcookie("nom", $nom, time() + 60 * 60 * 24 * 30);
									setcookie("prenom", $prenom, time() + 60 * 60 * 24 * 30);
									setcookie("passe", $passe, time() + 60 * 60 * 24 * 30);
									setcookie("remember", true, time() + 60 * 60 * 24 * 30);
								} else {
									setcookie("mail", "", time() - 3600);
									setcookie("nom", "", time() - 3600);
									setcookie("prenom", "", time() - 3600);
									setcookie("passe", "", time() - 3600);
									setcookie("remember", false, time() - 3600);
								}
							}
	-->