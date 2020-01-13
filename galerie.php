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
</body>
<head>
    <script>
        $(document).ready(function () {
            $('.jcarousel')
                .on('jcarousel:create jcarousel:reload', function() {
                    var element = $(this),
                        width = element.innerWidth();

                    if (width > 900) {
                        width = width / 3;
                    } else if (width > 600) {
                        width = width / 2;
                    }

                    element.jcarousel('items').css('width', width + 'px');
                })
        })

    </script>
</head>
<div class="h-100">
    <div class="text-center h1 ">Galerie</div>
    <div class="m-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mattis arcu auctor neque ullamcorper ornare at nec turpis. Vestibulum molestie lorem sed nulla condimentum volutpat. Praesent condimentum ut sapien vel fermentum. Ut gravida sagittis quam, ut dictum mauris facilisis ac. Etiam ligula ex, ultrices vitae ultrices ac, consectetur ac velit. Suspendisse potenti. Nunc mi nunc, condimentum a erat ac, aliquet interdum quam. In lobortis nec lectus id faucibus.</div>
    <div class="jcarousel-wrapper">
        <div class="jcarousel" data-jcarousel="true">
            <ul style="left: -864px; top: 0px;">

                <li style="width: 216px;"><img src="ressources/Bijoux/bj.jpg" alt="Image 2"></li>
                <li style="width: 216px;"><img src="ressources/Bijoux/bj1.jpg" alt="Image 3"></li>
                <li style="width: 216px;"><img src="ressources/Bijoux/bj2.jpg" alt="Image 4"></li>
                <li style="width: 216px;"><img src="ressources/Bijoux/bijoux-bague.jpg" alt="Image 5"></li>
        </div>

        <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
        <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>

        <p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1">1</a><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#5" class="">5</a><a href="#6" class="active">6</a></p>
    </div>
</div>
