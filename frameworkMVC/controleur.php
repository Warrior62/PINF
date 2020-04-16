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

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($mailSI = valider("mailSI"))
				if ($pwdSI = valider("pwdSI"))
				{
					if ( isMail($mailSI) && isPassword($pwdSI) && verifUser($mailSI,$pwdSI) )
					{
						$tab = getNomPrenom($mailSI);
						$_SESSION['connecte']=true;
						$_SESSION['passe']=$pwdSI;
						$_SESSION['mail']=$mailSI;
						$_SESSION['nom']=$tab[0];
						$_SESSION['prenom']=$tab[1];
						$isGoodForm = true;
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
					else $isGoodForm = false;
				}
			break;

			case 'Inscription' :
				if( $lName = valider("nomSU") )
				if( $fName = valider("prenomSU") )
				{ 
					if( $mail = valider("mailSU") )
					if( $pwd = valider("pwdSU") )
					{
						if( $num = valider("numSU") )
						if( $pseudo = valider("pseudoSU") )
						{
							if( isName($lName) && isName($fName) && isName($pseudo) && isMail($mail) && isPassword($pwd) && isPhoneNb($num) && !verifUser($mail,$pwd) )
							{
								SQLInsert("INSERT INTO users(nom,prenom,email,mdp,username) VALUES('$lName','$fName','$mail','$pwd','$pseudo')");
								empecherAdmin($pwd);
								$isGoodForm = true;
								$_SESSION['connecte']=true;
								$_SESSION['passe']=$pwd;
								$_SESSION['mail']=$mail;
								$_SESSION['pseudo']=$pseudo;
								$_SESSION['nom']=$lName;
								$_SESSION['prenom']=$fName;
							}
						}
					}
				}
			break;

			/*case 'Reparer':
				if( $typeBijou = valider("select_type") )
				if( $matiereBijou = valider("select_matiere") )
				{ 
					if( $pbBijou = valider("problemeBijou") )
					{
						$mailBijou = $_SESSION['mail'];
						$passeBijou = $_SESSION['passe'];
						$idUser = verifUserBdd($mailBijou,$passeBijou);
						$idTypeBijou = getIdType($typeBijou);
						$idMatiereBijou = getIdMatiere($matiereBijou);
						SQLInsert("INSERT INTO `reparationbijoux`(`idUser`, `idType`, `idMatiere`, `probleme`, `termine`, `numeroSAV`) VALUES ('$idUser','$idTypeBijou','$idMatiereBijou','$pbBijou','0',1111111)");
					}
				}
			break;*/

			case 'Logout' :
				session_destroy();
			break;

			case 'Envoyer' :
				if(isset($_GET["commentaire"]) && $_GET["commentaire"] !="" && $id=valider("id") && $note=valider("note")){
					if (!($note>5 || $note<0)) {
						$commentaire = addslashes($_GET["commentaire"]);
						addCommentaire($id, $commentaire,$note);
						$addArgs = "?view=galerie";
					}
					else
						$addArgs = "?view=galerie&erreur=note";
				}
				else
					$addArgs = "?view=galerie&erreur=vide";
			break;
		}
	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	if( $isGoodForm ) header("Location:" . $urlBase . $addArgs);
	else header("Location:" . $urlBase . "?view=login");

	// On écrit seulement après cette entête
	ob_end_flush();

?>
