<?php

//C'est la propriété php_self qui nous l'indique :
// Quand on vient de index :
// [PHP_SELF] => /chatISIG/index.php
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>
    <div class="page-header">
      <h1 class="text-center">Présentation</h1>
    </div>


    <p class="lead ml-5 mt-5">Bienvenue chez L'Atelier du Bijoutier</p>
    <div class="ml-5 mr-5 mb-5 text-justify">
      <p>Sur ce site internet, vous trouverez de nombreux outils concernant la réparation de vos bijoux. Vous pouvez, si vous le souhaitez, remplir un formulaire de réparation de bijou dans l’onglet « Réparer mon bijou ». Vous retrouverez l’ensemble de vos anciennes commandes dans l’onglet « Mes Bijoux ».</p>
      Un formulaire de contact beaucoup plus classique est également disponible pour répondre à vos éventuelles questions.
      <br/>
      Enfin vous pouvez également admirer le travail de notre artisan dans l’onglet « Galerie » et y déposer un commentaire.

    <br>
    <br>
    </div>
    <div class="ml-5 mr-5 bg-light">
    <div class="ml-5 mt-2 mb-4 p-1">
       <h3>NOTRE BOUTIQUE</h3>
			 <br>
			 <p>Anciennement bijoutier chez Jean Delatour, à Noyelles Godault, notre artisan accumule 19 ans d'expérience dans le domaine du bijou.</p>
       <p>L’atelier du Bijoutier est une boutique de qualité, située à Hénin-Beaumont, au 77 Place Jean Jaurès.
        <br/>
        Nous réparons toute sorte de bijoux (collier, bracelet, etc..) et toute sorte de matière (or, argent, etc…). Notre équipe sera vous conseiller et vous accompagner le plus professionnellement possible.
        <br/>
        Nous mettrons tout notre savoir-faire et nos connaissances à votre disposition pour réparer au mieux vos bijoux les plus précieux et leur redonner une seconde vie.
        </p>
    </div>
    </div>

    <blockquote class="text-center">
      <p>“Rien n'est estimable en soi, ni l'or, ni les perles, ni les soieries les plus fines. Un objet, si parfait soit-il, n'a de valeur que par le souvenir qu'il incarne.”</p>
      <footer style="text-decoration:underline">Louis Lefebvre / Guanahani </footer>
    </blockquote>
