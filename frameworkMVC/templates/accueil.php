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
       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mattis arcu auctor neque ullamcorper ornare at nec turpis. Vestibulum molestie lorem sed nulla condimentum volutpat. Praesent condimentum ut sapien vel fermentum. Ut gravida sagittis quam, ut dictum mauris facilisis ac. Etiam ligula ex, ultrices vitae ultrices ac, consectetur ac velit. Suspendisse potenti. Nunc mi nunc, condimentum a erat ac, aliquet interdum quam. In lobortis nec lectus id faucibus.
    <br>
    <br>
       Morbi vitae semper metus, vel congue diam. Nunc blandit pharetra purus ut accumsan. Proin iaculis mi sapien, vitae vestibulum est molestie a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur non cursus lectus, finibus maximus ex. Nam pulvinar elit est, eget malesuada felis tincidunt non. Duis volutpat fermentum turpis, et faucibus est pulvinar vulputate. Phasellus nec massa sit amet magna porta congue ac et leo. Praesent fringilla mi erat, et efficitur lorem egestas eu. Integer sed tincidunt ipsum. Curabitur at lectus sem. Integer tempor, tortor id malesuada mattis, velit dui lobortis dolor, nec maximus dolor est et lacus. Suspendisse vestibulum aliquam velit a eleifend. Maecenas id consectetur risus.
    <br>
    <br>
    </div>
    <div class="ml-5 mr-5 bg-light">
    <div class="ml-5 mt-2">
       <h3>NOTRE BOUTIQUE</h3>
       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mattis arcu auctor neque ullamcorper ornare at nec turpis. Vestibulum molestie lorem sed nulla condimentum volutpat. Praesent condimentum ut sapien vel fermentum. Ut gravida sagittis quam, ut dictum mauris facilisis ac. Etiam ligula ex, ultrices vitae ultrices ac, consectetur ac velit. Suspendisse potenti. Nunc mi nunc, condimentum a erat ac, aliquet interdum quam. In lobortis nec lectus id faucibus.</p>
    </div>
    </div>
