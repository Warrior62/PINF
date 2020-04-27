<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


/************* LOGIN *******************/
function empecherAdmin($pwd)
{
	// cette fonction affecte le booléen "admin" à faux
	$SQL = "UPDATE users SET adm=0 WHERE mdp like '$pwd'";
	SQLUpdate($SQL);
}

function getHash($mail){
    $SQL="select mdp from users where email like '".$mail."'";
    return SQLGetChamp($SQL);
}

function getId($mail){
    $SQL="SELECT idUser from users where email like '".$mail."'";
    return SQLGetChamp($SQL);
}

function verifMail($mail){
    $SQL="SELECT idUser from users where email like '".$mail."'";
    return SQLGetChamp($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT idUser FROM users WHERE email like '$login' AND mdp like '$passe'";

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

function isAdmin($idUser)
{
	// Vérifie si l'utilisateur est admin

	$SQL="SELECT adm FROM users WHERE idUser='$idUser'";
	return SQLGetChamp($SQL);
}

function isPhoneNb($pn)
{
	// Vérifie la conformité d'un numéro de téléphone saisi
	// renvoie true si le numéro de téléphone saisi est correcte
	// renvoie false sinon
	if(preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $pn)) return true;
	else return false;
}



/************* GALERIE *******************/
function getCommentaires()
{
	$SQL="SELECT commentaire,idUser,note,nom,prenom FROM users where commentaire not like \"\" AND commentaire is not null";
	return parcoursRs(SQLSelect($SQL));
}

function getUser($idUser)
{
	$SQL="SELECT nom,prenom FROM users WHERE idUser='$idUser'";
	return parcoursRs(SQLSelect($SQL));
}

function addCommentaire($id,$commentaire,$note)
{
	$SQL="UPDATE users SET commentaire='".$commentaire."',note='".$note."' WHERE idUser='$id'";
	echo("$SQL");
	return SQLUpdate($SQL);
}

/************* REPARATION DE MON BIJOU *******************/
function insertRéparationBijou($idUser,$type,$matiere,$probleme)
{
	$SQL = "SELECT max(idBijou) FROM reparationbijoux";
	$id = SQLGetChamp($SQL)+1;
	$SQL = "SELECT max(numeroSAV) FROM reparationbijoux";
	$SAV = SQLGetChamp($SQL)+1;
	$SQL = "INSERT INTO `reparationbijoux`(`idUser`, `idType`, `idMatiere`, `probleme`, `termine`, `numeroSAV`) VALUES ('$idUser','$type','$matiere','$probleme','0','$SAV')";
	return SQLInsert($SQL);

}

function getMatiere(){
	$SQL = "SELECT descMatiere FROM `matiere` ";
	return parcoursRs(SQLSelect($SQL));
}

function getTypeBijou(){
	$SQL = "SELECT descType FROM `type` ";
	return parcoursRs(SQLSelect($SQL));
}

function getIdType($accessoire)
{
	$SQL = "SELECT idType FROM type WHERE descriptionType=$accessoire";
	return SQLGetChamp($SQL);	
}

function getIdMatiere($accessoire)
{
	$SQL = "SELECT idMatiere FROM matiere WHERE descriptionMatiere=$accessoire";
	return SQLGetChamp($SQL);	
}


/************* COMMENTAIRES *******************/
// Permet de récupérer les commentaires avec leur id ainsi que le pseudo de la personne l'ayant envoyé directement depuis la bdd

// Permet de supprimer un commentaire avec un id entré en paramètres



/************* CONTACT *******************/
// Permet de récupérer le nom et prénom de la personne en fonction de son adresse mail
function getNomPrenom($email)
{
	$SQL = "SELECT nom,prenom,email FROM users where email='$email'";
	return parcoursRs(SQLSelect($SQL));

}
