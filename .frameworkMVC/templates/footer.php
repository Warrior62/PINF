<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset='UTF-8'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    </head>


<footer class="page-footer pt-5 text-center">
    <div class="bg-dark border-top pt-5 pb-5">
        <h5 class="text-uppercase text-light pb-3 pl-2 pr-2">L'ATELIER DU BIJOUTIER</h5>
        <div class="pt-3">
            <p class="text-light pb-3 pl-3 pr-3">77 Place Jean Jaurès - Hénin-Beaumont 62110</p>
            <p class="text-light pb-3 pl-1 pr-1">03 66 23 36 44</p>
        </div>
        <div class="pt-3">
            <a href="https://www.facebook.com/atelier.du.bijoutier/" target="_blank"><img src='pictures/facebook.svg' class='img-fluid pr-1' id='facebook-icon' style='max-width: 5%;height: auto' /></a>
            <a href="https://www.instagram.com/latelierdubijoutier/" target="_blank"><img src='pictures/instagram.svg' class='img-fluid pr-1 ml-5' id='instagram-icon' style='max-width: 4%;height: auto' />
        </div>
    </div>
</footer>


</body>
</html>