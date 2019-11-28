<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Mes Bijoux</title>

    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 0 1.4em 1.4em !important;
            margin: auto;
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

    </style>
</head>
    
<div class="row text-center mt-4 w-75" style="margin:auto">
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

<p class="text-left mt-4 mb-4" style="margin:auto;max-width:75vw">Sur cette page, vous pouvez consulter l'historique de vos réparations et éventuellement poster un avis sur celle(s) effectuée(s).</p>

<!-- PHP 
    if( $nbJwl==0 ) echo "<p class="h5 text-center">Aucune réparation n'a été effectuée.</p>";
    else echo "<div class="container">. . .</div>";
-->

<div class="container">
    <fieldset class="scheduler-border">
        <legend class="scheduler-border ">Bijou°<span id="jwlNum"><!-- PHP chercher ds bdd numero du jewel --></span></legend>
        <div class="row">
            <!-- Etat du bijou : div à gauche dans le fieldset -->
            <div class="col-md-6">
                <form class="mt-5 pt-3 pb-1 pl-3 pr-3 w-75">
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="jwlNumSAV">Numéro SAV</label>
                        </div>
                        <div class="col-sm">
                            <input id="jwlNumSAV" class="w-100" type="text" disabled/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm">
                            <label for="jwlState">Etat de la réparation</label>
                        </div>
                        <div class="col-sm">
                            <input id="jwlState" class="w-100 text-center text-warning" style="font-size:85%" type="text" value="En cours" disabled/>
                        </div>
                    </div>
                </form>
            </div>  
            <!-- Informations sur le bijou : div à droite dans le fieldset -->
            <div class="col-md-6 pl-4">
                <p class="h6 mt-4">Informations sur le bijou</p>
                <form class="border border-dark rounded-sm pt-3 pb-1 pl-3 pr-3 w-75">
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="jwlDesignation">Désignation</label>
                        </div>
                        <div class="col-sm">
                            <input id="jwlDesignation" class="w-100" type="text" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="jwlMateriau">Matériau</label>
                        </div>
                        <div class="col-sm">
                            <input id="jwlMateriau" class="w-100" type="text" disabled/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <label for="jwlProbleme">Problème</label>
                        </div>
                        <div class="col-sm">
                            <input id="jwlProbleme" class="w-100" type="text" disabled/>
                        </div>
                    </div>
                </form>
            </div>
            <a class="mt-4 ml-4 font-italic text-decoration-none text-dark" style="font-size:90%" href=""><!-- PHP href=header("Location:../index.php?view=galery"); -->Cliquez ici pour laisser un avis !</a>
        </div>
    </fieldset>
</div>






