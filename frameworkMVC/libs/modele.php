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

function isName($bool, $str)
{
    $nLength = count($str);
	
	if( $nLength == 0 ) return false;
	else {
		if( !(is_numeric($str)) ) return false;
		else {
			if( preg_match('[0-9]', $str)) return false;
			else return true;
		}
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
	// renvoie true si le mot de passe comporte entre 6 et 20 caractères
	// renvoie false sinon 
	if( count($pwd) >= 6 && count($pwd) <= 20 ) return true;
	else return false;
}

function isPhoneNb($pn)
{
	// Vérifie la conformité d'un numéro de téléphone saisi
	// renvoie true si le numéro de téléphone saisi est correcte
	// renvoie false sinon 
	if( is_int($pn) && count($pn) == 10 ) return true;
	else return false;
}



