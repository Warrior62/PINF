<?php

// préparation de l'entête du mail:
$headers = "From:" . $_SESSION['mail'];
//echo $headers;
$to = "mathistryla@gmail.com";
$sujet = $_POST["sujetContact"];
//echo $sujet;
// préparation du corps du mail
$mail_corps  = "Message de : ".$_SESSION["nom"]." ".$_SESSION["prenom"]."\n";
//$mail_corps .= "Sujet : ".$_POST["sujetContact"]."\n\n\n";
$mail_corps .= $_POST["messageContact"];
//echo $mail_corps;
//die("");
// envoi du mail
mail($to,$sujet,$mail_corps,$headers);
//$_SESSION["mail_envoye"]=true;
header("Location: ./index.php?view=accueil");



