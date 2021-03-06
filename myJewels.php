<?php
    include_once("./libs/maLibSQL.pdo.php");
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Mes Bijoux</title>

    <style>
        fieldset.scheduler-border {
            background-image: linear-gradient(#00215E, #002966);
            border: 2px inset #ddd !important;
            border-radius: 10px;
            padding: 0 0 1.4em 1.4em !important;
            margin: auto;
            margin-top: 10vh;
            max-width: 75vw;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }

        .infosDiv{
            background-color: #dfbf9f;
        }

        label, a{
            color: white;
        }

    </style>
</head>
    
<div class="row text-center mt-5 w-75" style="margin:auto">
    <div class="col-4">
        <hr class="w-50">
    </div>
    <div class="col-4">
        <p class="h4 text-center">Mes bijoux</p>
    </div>
    <div class="col-4">
        <hr class="w-50">
    </div>
</div>

<p class="text-center mt-5 mb-5" style="margin:auto;max-width:75vw">Sur cette page, vous pouvez consulter l'historique de vos réparations et éventuellement poster un avis sur celle(s) effectuée(s).</p>

<?php
    $nbJwl = SQLGetChamp("SELECT COUNT(idBijoux) FROM bijou");

    $numSav = parcoursRs(SQLSelect("SELECT numSav FROM bijou"));    
    $descJwl = parcoursRs(SQLSelect("SELECT descBijoux FROM bijou"));
    $labelJwl = parcoursRs(SQLSelect("SELECT designation FROM bijou"));
    $matJwl = parcoursRs(SQLSelect("SELECT materiau FROM bijou"));

    if( $nbJwl==0 ) echo '<p class="h6 text-center">(Aucune réparation n\'a été effectuée.)</p>';
    else {
        for($i=1; $i<=$nbJwl; $i++){
            echo '
            <div class="container mb-5 mt-5">
                <fieldset class="scheduler-border">        
                    <div class="row">
                        <!-- Etat du bijou : div à gauche dans le fieldset -->
                        <div class="col-md-6">
                            <form class="mt-5 pt-3 pb-1 pl-3 pr-3 w-75">
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <label for="jwlNumSAV">Numéro SAV</label>
                                    </div>
                                    <div class="col-sm">
                                        <input id="jwlNumSAV" class="w-100" type="text" value="'.$numSav[$i-1]["numSav"].'" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-sm">
                                        <label for="jwlState">Etat de la réparation</label>
                                    </div>
                                    <div class="col-sm">
                                        <input id="jwlState" class="w-100 text-center text-danger" style="font-size:85%" type="text" value="En cours" disabled/>
                                    </div>
                                </div>
                            </form>
                        </div>  
                        <!-- Informations sur le bijou : div à droite dans le fieldset -->
                        <div class="col-md-6 pl-4">
                            <p class="h6 mt-4" style="color:white">Informations sur le bijou</p>
                            <form class="border border-dark rounded-sm pt-3 pb-1 pl-3 pr-3 w-75 infosDiv">
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <label for="jwlDesignation">Désignation</label>
                                    </div>
                                    <div class="col-sm">
                                        <input id="jwlDesignation" class="w-100" type="text" value="'.$labelJwl[$i-1]["designation"].'" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <label for="jwlMateriau">Matériau</label>
                                    </div>
                                    <div class="col-sm">
                                        <input id="jwlMateriau" class="w-100" type="text" value="'.$matJwl[$i-1]["materiau"].'" disabled/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <label for="jwlProbleme">Problème</label>
                                    </div>
                                    <div class="col-sm">
                                        <textarea id="jwlProbleme" class="w-100" disabled>'.$descJwl[$i-1]["descBijoux"].'</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a class="mt-4 ml-4 font-italic text-decoration-none" style="font-size:90%" href="'.header("Location:../index.php?view=galery").'">Cliquez ici pour laisser un avis !</a>
                    </div>
                </fieldset>
            </div>';
        }
    }
?>







