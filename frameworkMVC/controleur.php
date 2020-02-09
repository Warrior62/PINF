<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			
			
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($mailSI = valider("mail"))
				if ($pwdSI = valider("pwd"))
				{
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($mailSI,$pwdSI)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (valider("remember")) {
							setcookie("mail",$mailSI , time()+60*60*24*30);
							setcookie("pwd",$pwdSI, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("mail","", time()-3600);
							setcookie("pwd","", time()-3600);
							setcookie("remember",false, time()-3600);
						}

					}	
				}

				// On redirigera vers la page index automatiquement
			break;

			case 'Inscription' :
				
				if( $lName = valider("nomSU") )
				if( $fName = valider("prenomSU") )
				{
					if( $mail = valider("mailSU") )
					if( $pwd = valider("pwdSU") )
					{
						if( $num = valider("numSU") )
						{
							if( isName($lName) && isName($fName) && isMail($mail) && isPassword($pwd) && isPhoneNb($num) && !alreadyExists($mail) )
							{
								SQLInsert("INSERT INTO users(nom,prenom,email,mdp) VALUES('$lName','$fName','$mail','$pwd')");
								empecherAdmin($pwd);
								$isGoodForm = true;

								setcookie("login",urlencode($mail) , time()+60*60*24*30);
							    setcookie("passe",urlencode($pwd), time()+60*60*24*30);
							}
							else{
								$alerte = "Erreur dans formulaire !";
								$isGoodForm = false;
								echo $alerte; 
							} 
						}
					}
				}
				
			break;
				

			case 'Logout' :
				session_destroy();
			break;




		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	if( $isGoodForm ) header("Location:" . $urlBase . $addArgs);
	else header("Location:" . $urlBase . "?view=signUp");

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>










