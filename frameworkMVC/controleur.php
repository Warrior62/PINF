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
					if ( isMail($mailSI) && isPassword($pwdSI) && password_verify($pwdSI,getHash($mailSI) ))
					{

						$tab = getNomPrenom($mailSI);
						$_SESSION['idUser']=getId($mailSI);
						$_SESSION['connecte']=true;
						$_SESSION['passe']=$pwdSI;
						$_SESSION['mail']=$mailSI;
						$_SESSION['nom']=$tab[0];
						$_SESSION['prenom']=$tab[1];
						$addArgs = "?view=accueil";
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
					else $addArgs = "?view=login";
				}
				else
					$addArgs="?view=login";
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
							if( isName($lName) && isName($fName) && isName($pseudo) && isMail($mail) && isPassword($pwd) && isPhoneNb($num) && !password_verify($pwd,getHash($mail)) )
							{
								if (!verifMail($mail)) {
									$timeTarget = 0.05; // 50 milliseconds
									$cost = 8;
									do {
										$cost++;
										$start = microtime(true);
										$encrypted_password = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => $cost]);
										$end = microtime(true);
									} while (($end - $start) < $timeTarget);
									$id = SQLInsert("INSERT INTO users(nom,prenom,email,mdp,username) VALUES('$lName','$fName','$mail','$encrypted_password','$pseudo')");
									empecherAdmin($pwd);
									$isGoodForm = true;
									$_SESSION['idUser'] = $id;
									$_SESSION['connecte'] = true;
									$_SESSION['passe'] = $pwd;
									$_SESSION['mail'] = $mail;
									$_SESSION['pseudo'] = $pseudo;
									$_SESSION['nom'] = $lName;
									$_SESSION['prenom'] = $fName;
								}
								else $addArgs="?view=login&erreur=mail";
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
				if(isset($_GET["commentaire"]) && $_GET["commentaire"] !="" && isset($_GET["id"])&& $note=valider("note")){
					if (!($note>5 || $note<0)) {
						$commentaire = addslashes($_GET["commentaire"]);
						addCommentaire($_GET["id"], $commentaire,$note);
						$addArgs = "?view=galerie";
					}
					else
						$addArgs = "?view=galerie&erreur=note";
				}
				else
					$addArgs = "?view=galerie&erreur=vide";
			break;
			case 'Valider':
				if ($mailContact=valider("mailContact") && $nomContact=valider("nomContact") && $prenomContact=valider("prenomContact") && $sujet=valider("sujetContact") && $message=valider("messageContact")){


					// Ma clé privée
					$secret = "6Ld1yuwUAAAAAIUHShhYNy3Il8SysvqjQAXw581p";
					// Paramètre renvoyé par le recaptcha
					$response = $_POST['g-recaptcha-response'];
					// On récupère l'IP de l'utilisateur
					$remoteip = $_SERVER['REMOTE_ADDR'];

					$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
						. $secret
						. "&response=" . $response
						. "&remoteip=" . $remoteip;

					$decode = json_decode(file_get_contents($api_url), true);

					if ($decode['success'] == true) {
						// C'est un humain


						$contenu = '
												<html>
												<head>
												   <title>' . $sujet . '</title>
												</head>
												<body> De ' . $nomContact . ' ' . $prenomContact . ' : ' . $mailContact . '
												  <br> <p>' . $message . '</p>
												</body>
												</html>';
						$entetes =
							'Content-type: text/html; charset=utf-8' . "\r\n" .
							'From: email@domain.tld' . "\r\n" .
							'Reply-To: email@domain.tld' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();

						//Envoi du mail
						mail("genokileur62@gmail.com", $sujet, $contenu, $entetes);
						}
					else
					{
						$addArgs="?view=contact&erreur=1";
					}
					}
					else
					{
						$addArgs="?view=contact&erreur=1";
					}
					break;
					}
					}

					// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
					// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
					// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

					$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
					// On redirige vers la page index avec les bons arguments

					header("Location:" . $urlBase . $addArgs);

					// On écrit seulement après cette entête
					ob_end_flush();

					?>
