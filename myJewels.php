<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    

    <title>Mes Bijoux</title>

    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }
    </style>
</head>

<p class="h3 text-center">Mes bijoux</p>

  <div class="container-fluid">
    <div class="cold-md-12">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Bijou°1</legend>
            <div class="control-group">
                <label class="control-label input-label mt-4" for="nameInput">Nom :</label>
                <input type="text" id="nameInput" disabled/>
            </div>
            <div class="control-group">
                <label class="control-label input-label mt-3" for="stateInput">Etat :</label>
                <div id="stateInput"></div>
            </div>
            <div class="control-group mt-3 font-italic" id="avisDiv">
                <a class="text-decoration-none text-dark" href="">Cliquez ici pour laisser un avis !</a>
            </div>
        </fieldset>
    </div>
  </div>




