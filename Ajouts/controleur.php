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
					if ( isMail($mailSI) && isPassword($pwdSI) && alreadyExists($mailSI) )
					{
						$_SESSION['connecte']=true;
						$_SESSION['passe']=$pwdSI;
						$_SESSION['idUser']=verifUserBdd($mailSI,$pwdSI);
						$_SESSION['prenom']=getPrenomUser($_SESSION['idUser']);
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
						{
							if( isName($lName) && isName($fName) && isMail($mail) && isPassword($pwd) && isPhoneNb($num) && !alreadyExists($mail) )
							{
								SQLInsert("INSERT INTO users(nom,prenom,email,mdp) VALUES('$lName','$fName','$mail','$pwd')");
								empecherAdmin($pwd);
								$isGoodForm = true;
							}
						}
					}
				}
			break;

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

			/**********REPARATION DE MON BIJOU************/
			case 'Valider' :

				if($problemeBijou= valider("problemeBijou") and $idType= valider("idType") and $idMatiere= valider("idMatiere"))
				$date=$_GET["date"];
				if(!empty($idType) and !empty($idMatiere) and !empty($problemeBijou) and !empty($date)){
					$idUser=$_GET["idUser"];
					//echo "------>".$idUser."<-----";

					$tableauType = getIDType($idType);
					foreach ($tableauType as $nextTab )
					{
						$idType = $nextTab["idType"];
					}
					
					$tableauMatiere = getIDMatiere($idMatiere);
					foreach ($tableauMatiere as $nextTab )
					{
						$idMatiere = $nextTab["idMatiere"];
					}
					echo "--->".$idType."<--";
					insertRéparationBijou($idUser,$idType,$idMatiere,$problemeBijou,$date);
					$addArgs = "?view=myJewels";
				}
				else
					$addArgs = "?view=reparationsBijoux&erreur";
			break;
		}
	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	/*if( $isGoodForm )*/ header("Location:" . $urlBase . $addArgs);
	//else header("Location:" . $urlBase . "?view=login");

	// On écrit seulement après cette entête
	ob_end_flush();

?>
