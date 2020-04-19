<?php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}

?>

    <title>Galerie</title>
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
                });


            var $star_rating = $('.note');

            var SetRatingStar = function(val) {
                $star_rating.each(function() {
                    if (val >= parseInt($(this).data('rating'))) {
                        return $(this).removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        return $(this).removeClass('fa-star').addClass('fa-star-o');
                    }
                });
            };

            $('.note').on('click', function() {
                $('input.rating-value').val($(this).data('rating'));
                $("#note_envoyer").val($(this).data('rating'));
                SetRatingStar($(this).data('rating'));
            })
        });


    </script>

<div>
	<div class="row text-center mt-5 w-75" style="margin:auto">
				<div class="col-4">
						<hr class="w-50">
				</div>
				<div class="col-4">
						<p class="h4 text-center">Galerie</p>
				</div>
				<div class="col-4">
						<hr class="w-50">
				</div>
	</div>
    <div class="m-5">Bienvenue dans notre galerie ! Vous trouverez ci-dessous des images de type de réparation que je peux réaliser pour vous. 
    J'espère que cela vous donnera envie de me joindre pour la réparation de votre bague, collier ou bracelet préféré ! </div>
    <div class="jcarousel-wrapper ml-5 mr-5">
        <div class="jcarousel" data-jcarousel="true">
            <ul style="left: -864px; top: 0px;">
                <li style="width: 216px;"><img src="./ressources/Bijoux/bj.jpg" alt="Image 2"/></li>
                <li style="width: 216px;"><img src="./ressources/Bijoux/bj1.jpg" alt="Image 3"/></li>
                <li style="width: 216px;"><img src="./ressources/Bijoux/bj2.jpg" alt="Image 4"/></li>
                <li style="width: 216px;"><img src="./ressources/Bijoux/bijoux-bague.jpg" alt="Image 5"></li>
            </ul>
</div>

<a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true">‹</a>
<a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>

<p class="jcarousel-pagination" data-jcarouselpagination="true"><a href="#1" class="active">1</a><a href="#2">2</a><a href="#3">3</a><a href="#4">4</a><a href="#5">5</a><a href="#6">6</a></p>
</div>
    <div class="d-flex mb-5 flex-column">
    <div class="m-5 h4">
        Avis / Commentaires :
    </div>
        <?php
            $commentaires=getCommentaires();
            $arr_length = count($commentaires);
            for($i=0;$i<$arr_length;$i++) {
                if ( $commentaires[$i]["commentaire"]!="") {
                    echo("<div class='d-flex flex-row bg-light ml-5 mr-5 mb-2'>");
                    echo("<img src='./ressources/user_logo.png' class='m-3' style='height: 50px;width:50px'/>");
                    echo("<div class='d-flex flex-column'>");
                    echo("<div class='mr-auto mb-auto mt-auto'>" . $commentaires[$i]["commentaire"] . "</div>");
                    echo("<div class='d-flex flex-row m-align-items-center'>");
                    echo("<div class=\"star-rating\">");
                    for ($j=0;$j<$commentaires[$i]["note"];$j++)
                        echo("<span class='fa fa-star'></span>");
                    for ($j=$commentaires[$i]["note"]-5;$j>0;$j--)
                        echo("<span class='fa fa-star-o'></span>");
                    echo("</div></div></div></div>");
                }
            }



            if (isset($_GET["erreur"]) && $_GET["erreur"]=="note")
                echo("<div class='text-danger ml-5'>Veuillez rentrez une note pour envoyer votre commentaire.</div>");
            else if (isset($_GET["erreur"]) && $_GET["erreur"]=="vide")
                echo("<div class='text-danger ml-5'>Veuillez rentrez un commentaire pour envoyer votre commentaire.</div>");


            if (isset($_SESSION["connecte"]) && $_SESSION["connecte"] && isset($_SESSION["idUser"])){
                echo("<div class='d-flex flex-row'><div class=\"m-5 h4\">Laissez nous un commentaire :</div>
                        <div class='d-flex flex-row text-center justify-content-center align-items-center'>
                         <div class=\"star-rating\">
                        <span class=\"note fa fa-star-o\" data-rating=\"1\"></span>
                        <span class=\"note fa fa-star-o\" data-rating=\"2\"></span>
                        <span class=\"note fa fa-star-o\" data-rating=\"3\"></span>
                        <span class=\"note fa fa-star-o\" data-rating=\"4\"></span>
                        <span class=\"note fa fa-star-o\" data-rating=\"5\"></span>
                        <input type=\"hidden\" name=\"whatever1\" class=\"rating-value\" value=\"0\">
                        </div></div></div>
                        <form action=\"controleur.php\">
                        <input id='note_envoyer' type='hidden' name='note' value='0'>
                        <input type='hidden' name='id' value='".$_SESSION["idUser"]."'>
                        <textarea class=\"ml-5 mr-5 w-75\" name=\"commentaire\" style=\"margin-bottom: 100px;height:200px\" maxlength='250'></textarea><br>
                        <input type=\"submit\" name=\"action\" class=\"ml-5 btn btn-secondary\" style=\"margin-bottom: 100px;margin-top: -100px\" value=\"Envoyer\"></form>");
            }




        ?>


    </div>
</div>