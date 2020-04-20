<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


/************* LOGIN *******************/
function empecherAdmin($pwd)
{
	// cette fonction affecte le booléen "admin" à faux
	$SQL = "UPDATE users SET adm=0 WHERE mdp='$pwd'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT idUser FROM users WHERE email='$login' AND mdp='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function isName($str)
{
    $nLength = strlen($str);
	echo $nLength;
	if( $nLength == 0 ) return false;
	else {
		if( preg_match('[0-9]', $str)) return false;
		else return true;
	}
}

function isMail($mail)
{
	// Vérifie la conformité d'une adresse mail saisie
	// renvoie true si l'adresse mail saisie est correcte
	// renvoie false sinon
	if( filter_var($mail, FILTER_VALIDATE_EMAIL) ) return true;
	else return false;
}

function isPassword($pwd)
{
	// Vérifie la conformité du mot de passe saisi
	// renvoie true si le mot de passe comporte 6 ou plus
	// renvoie false sinon

	if( strlen($pwd) >= 6 ) return true;
	else return false;
}

function isAdmin($pwd)
{
	// Vérifie si l'utilisateur est admin

	$SQL="SELECT adm FROM users WHERE mdp='$pwd'";
	
	if ( SQLGetChamp($SQL) == 1 )
		return true;
	else
		return false;
}

function isPhoneNb($pn)
{
	// Vérifie la conformité d'un numéro de téléphone saisi
	// renvoie true si le numéro de téléphone saisi est correcte
	// renvoie false sinon
	if(preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $pn)) return true;
	else return false;
}

function alreadyExists($email)
{
	$SQL="SELECT email FROM users";
	$tab = parcoursRs(SQLSelect($SQL));
	$i=0;

	foreach($tab as $ssTab) {
		$emailTab[$i] = $ssTab["email"];
		$i++;
	}

	foreach ($emailTab as $value)
		if( $email == $value )
			return true;

	return false;
}

/************* GALERIE *******************/
function getCommentaires()
{
	$SQL="SELECT commentaire,idUser,note FROM users";
	return parcoursRs(SQLSelect($SQL));
}

function getPrenomUser($idUser)
{
	$SQL="SELECT prenom FROM users WHERE idUser='$idUser'";
	return SQLGetChamp($SQL);
}

function addCommentaire($id,$commentaire,$note)
{
	echo("id=".$id."comm=".$commentaire);
	$SQL="UPDATE users SET commentaire='".$commentaire."',note='".$note."' WHERE idUser='$id'";
	return SQLUpdate($SQL);
}

/************* REPARATION DE MON BIJOU *******************/
function insertRéparationBijou($idUser,$idType,$idMatiere,$probleme,$date)
{
	$SQL = "SELECT max(idReparation) FROM reparationbijoux";
	if($SQL==NULL)
		$SQL=0;
	$id = SQLGetChamp($SQL)+1;
	$SQL = "SELECT max(numeroSAV) FROM reparationbijoux";
	if($SQL==NULL)
		$SQL=0;
	$SAV = SQLGetChamp($SQL)+1;
	$SQL = "INSERT INTO `reparationbijoux`(`idReparation`, `idUser`, `idType`, `idMatiere`, `probleme`, `termine`, `numeroSAV`,`date`) VALUES ('$id','$idUser','$idType','$idMatiere','$probleme','0','$SAV','$date')";
	return SQLInsert($SQL);

}


function getMatiere(){
	$SQL = "SELECT * FROM `matiere` ";
	return parcoursRs(SQLSelect($SQL));
}

function getTypeBijou(){
	$SQL = "SELECT * FROM `type` ";
	return parcoursRs(SQLSelect($SQL));
}

function getIDType($descType){
	$SQL = "SELECT `idType` FROM `type` WHERE `descType` LIKE '$descType'";
	return parcoursRs(SQLSelect($SQL));
}

function getIDMatiere($descMatiere){
	$SQL = "SELECT `idMatiere` FROM `matiere` WHERE `descMatiere` LIKE '$descMatiere'";
	return parcoursRs(SQLSelect($SQL));
}


/************* COMMENTAIRES *******************/
//Permet de récupérer les commentaires avec leur id ainsi que le pseudo de la personne l'ayant envoyé directement depuis la bdd
function getCommentaire()
{
	$SQL='SELECT u.username,c.idCommentaire,c.commentaire FROM commentaire c, users u WHERE u.idUser=c.idUser';
	return parcoursRs(SQLSelect($SQL));
}

//Permet de supprimer un commentaire avec un id entré en paramètres
function deleteCommentaire($id)
{
	$SQL="DELETE FROM commentaire WHERE idCommentaire='$id'";
	SQLDelete($SQL);
}
