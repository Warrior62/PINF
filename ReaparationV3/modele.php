<?php


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");


function listerUtilisateurs($classe = "both")
{
	// NB : la présence du symbole '=' indique la valeur par défaut du paramètre s'il n'est pas fourni
	// Cette fonction liste les utilisateurs de la base de données 
	// et renvoie un tableau d'enregistrements. 
	// Chaque enregistrement est un tableau associatif contenant les champs 
	// id,pseudo,blacklist,connecte,couleur

	// Lorsque la variable $classe vaut "both", elle renvoie tous les utilisateurs
	// Lorsqu'elle vaut "bl", elle ne renvoie que les utilisateurs blacklistés
	// Lorsqu'elle vaut "nbl", elle ne renvoie que les utilisateurs non blacklistés

	$SQL = "select * from users";
	if ($classe == "bl")
		$SQL .= " where blacklist=1";
	if ($classe == "nbl")
		$SQL .= " where blacklist=0";
	
	// echo $SQL;
	return parcoursRs(SQLSelect($SQL));

}


function interdireUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à vrai
	$SQL = "UPDATE users SET blacklist=1 WHERE id='$idUser'";
	// les apostrophes font partie de la sécurité !! 
	// Il faut utiliser addslashes lors de la récupération 
	// des données depuis les formulaires

	SQLUpdate($SQL);
}

function autoriserUtilisateur($idUser)
{
	// cette fonction affecte le booléen "blacklist" à faux 
	$SQL = "UPDATE users SET blacklist=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM users WHERE pseudo='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}


/*************REPARATION DE MON BIJOU*******************/
function insertRéparationBijou($idUser,$idType,$idMatiere,$probleme,$date)
{
	$SQL = "SELECT max(idBijou) FROM reparationbijoux";
	$id = SQLGetChamp($SQL)+1;
	$SQL = "SELECT max(numeroSAV) FROM reparationbijoux";
	$SAV = SQLGetChamp($SQL)+1;
	$SQL = "INSERT INTO `reparationbijoux`(`idBijou`, `idUser`, `idType`, `idMatiere`, `probleme`, `termine`, `numeroSAV`,`date`) VALUES ('$id','$idUser','$idType','$idMatiere','$probleme','0','$SAV','$date')";
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

?>
