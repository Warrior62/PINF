<title>Pannel Réparation</title>


<div class="row text-center mt-5 mb-5 w-75" style="margin:auto">
    <div class="col-4">
        <hr class="w-50">
    </div>
    <div class="col-4">
        <p class="h4 text-center">Voici la liste des différentes réparations en cours</p>
    </div>
    <div class="col-4">
        <hr class="w-50">
    </div>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Numéro SAV</th>
            <th scope="col">Problème</th>
            <th scope="col">Etat de la réparation</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php 
        $infosReparation=infosReparation();
        for ($i=0; $i<count($infosReparation); $i++){
            if( $infosReparation[$i]['termine']==0 ) {
                $infosReparation[$i]['termine'] = "En cours";
                echo("<tr>
                <th scope='row'>" . $infosReparation[$i]['numeroSAV'] . "</th>
                <td>" . $infosReparation[$i]['probleme'] . "</td>
                <td>" . $infosReparation[$i]['termine'] . "</td>
                <td><input class='btn btn-outline-success' type='button' name='Supprimer' value='Finir réparation' id='" . $numSav[$i]['idReparation'] . "' onclick='majReparation(".$infosReparation[$i]['idReparation'].")'/></td>
                </tr>"
            );
        }
    }
    ?>
</table>
<br />

<script>
    /*
    * Cette fonction permet de metre à jour l'état de réparation d'un bijou avec une vérification à l'aide de son id en faisant appel à la fonction updateReparation($id) dans le modele.php
    */
    function majReparation(id){
        if(confirm('Voulez-vous vraiment considérer cette réparation comme finie ?')){
            console.log("Tu as cliqué sur oui / l'id cliqué est : " + id);
            document.cookie = "idReparation="+id;
            <?php if (isset($_COOKIE["idReparation"])) {
                updateReparation($_COOKIE["idReparation"]);
                //deleteReparation($_COOKIE["idReparation"]);
            }
  			?>
            window.location.reload();
        }
        else{
            console.log("Tu as cliqué sur non / l'id cliqué est : " + id);
        }
    }
        
</script>