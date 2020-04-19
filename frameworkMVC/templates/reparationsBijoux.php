<?php 
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php";
if( empty($_SESSION['connecte']) ){
	echo "<div class=\"row text-center mt-5 w-75\" style=\"margin:auto\">
		    <div class=\"col-4\">
		        <hr class=\"w-50\">
		    </div>
		    <div class=\"col-4\">
		        <p class=\"h4 text-center\">Réparation de mon bijou</p>
		    </div>
		    <div class=\"col-4\">
		        <hr class=\"w-50\">
		    </div>
	</div><br/><br/>";
	echo "<h4 class=\"text-center\">Merci de vous connecter ou créer un compte pour accéder à ce service</h4>";
	echo "<p class=\"text-center\">Ne bouger pas ! Vous allez être redirigé vers la page de connexion d'ici 5 secondes</p>";


	echo "<meta http-equiv=\"refresh\" content=\"5;URL=?view=login\">";
}
else
{
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=reparationsBijoux");
	die("");
} 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Reparations</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 </head>

<script src="jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function()
		{	
			$("#probleme").keyup(function()
			{
				if($("#probleme").val().length== 0)
				{
					$("#probleme").css({
						borderColor : 'grey',
					});
					$("#divProbleme small").html("Il reste 255 caractère(s)");
				}
				if($("#probleme").val().length < 256 && $("#probleme").val().length != 0)
				{
					
					$("#probleme").css({
						borderColor : 'green',
					});

					
					$("#divProbleme small").html("Il reste "+(255-$("#probleme").val().length)+" caractère(s)");
				}
				else
				if($("#probleme").val().length > 255)
				{
					$("#probleme").css({
						borderColor : 'red',
					});
					$("#divProbleme small").html("Il y a "+($("#probleme").val().length-255)+" caractère(s) de trop !");
				}
			});

			$("select").on('input',function(){
				console.log($(this).val());
				if($(this).val()==-1)
				{
					$(this).css({
						borderColor : 'red',
					});
				}
				else
					$(this).css({
						borderColor : 'green',
					});
			});
		});
	</script>

 <body>
 	<div class="row text-center mt-5 w-75" style="margin:auto">
		    <div class="col-4">
		        <hr class="w-50">
		    </div>
		    <div class="col-4">
		        <p class="h4 text-center">Réparation de mon bijou</p>
		    </div>
		    <div class="col-4">
		        <hr class="w-50">
		    </div>
	</div>
	<br/>
 <div class="container">
 	<div class="row justify-content-between">
 		<div class="col-4">
	 	<form action="controleur.php" method="POST">
	 		<?php  //tprint($_SESSION);
	 		echo "<input type=\"hidden\" name=\"idUser\" value=".$_SESSION['idUser'].">"?>
	 		<fieldset id="bijou">
	 					<div class="form-group">
	 					<label for="type">Type de bijou</label>
	 					<select class="form-control couleur" name="idType" id="select_type">
	 						<option selected value="-1">Veuillez sélectionner une option</option>
	 						<?php 
									$tableauType=getTypeBijou();
									//tprint($tableauType);
									foreach ($tableauType as $nextTab )
									{
										$descType = $nextTab["descriptionType"];
										echo "<option name=\"$idType\">". $descType ."</option>";
									}
									
							?>
	 					</select>
	 				</div>
	 					<br/>
	 					<div class="form-group">
	 					<label for="matiere">Matière</label>
	 					<select class="form-control couleur" name="idMatiere" id="select_matiere">
	 						<option selected value="-1">Veuillez sélectionner une option</option>

	 						<?php 
									$tableauMatiere=getMatiere();
									//tprint($tableauMatiere);
									foreach ($tableauMatiere as $nextTab )
									{
										$descMatiere = $nextTab["descriptionMatiere"];
										echo "<option name=\"$idMatiere\">". $descMatiere ."</option>";
									}
							?>

	 					</select>
	 					
	 				</div>
	 					<br/>
	 				<div class="form-group" id="divProbleme">
	 					<label for="probleme">Problème(s) sur le bijou</label>
	 					<textarea class="form-control couleur" id="probleme" name="problemeBijou" rows="3"></textarea>
	 					<small class="form-text text-center">Il reste 255 caractère(s)</small>
	 				</div>
	 		</fieldset>
	 		<fieldset id="rendez-vous">
	 			<!--SCRIPT POUR DATEPICKER-->
      			<script>
					$(function() {
					$( "#datepicker" ).datepicker({
					    altField: "#datepicker",
					    closeText: 'Fermer',
					    prevText: 'Précédent',
					    nextText: 'Suivant',
					    currentText: 'Aujourd\'hui',
					    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
					    monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
					    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
					    dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
					    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
					    weekHeader: 'Sem.',
					    dateFormat: 'yy-mm-dd',
					    minDate : 0,
					    onSelect: function()
					    	{
					    	var date = document.getElementById("datepicker").value;
					    	//date.style.borderColor='green';
					    	document.getElementById("divDate").innerHTML = "<input type=\"hidden\" name=\"date\" value=" + date + "/>";
					    	var regex = /[0-9]/;
							//console.log(regex.test('2020-09-09'));
							if(regex.test($("#datepicker").val()))
							$("#datepicker").css({
									borderColor : 'green',
								});
					   		}
					    });
					});
					$(function() {
						$( "#datepicker" ).datepicker();
					});
				</script>
        
	 			<div class="form-group">
	 				<label for="datepicker">Prendre un rendez-vous</label>
	 				<input type="text" name="datepicker" id="datepicker" class="form-control couleur"/>

	 			</div>
	 		</fieldset>
	 			<div id="divDate"></div>
	 		<input type="submit" value="Réparer" name="action" class='btn btn-block w-50 text-light bg-dark mt-5'/>
	 	</form>
				 	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
			         rel = "stylesheet">
			      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
			      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

   
	 </div>
	 <div class="col-7">
	 	<!--IMAGE-->
	 	<img src="ressources/photoReparationBijou.jpg" alt="photoReparationBijou" class="w-100 img-fluid rounded mt-5 ml-5"/>
	 </div>
	</div>
 </div>
 </body>
 </html>
<?php } 
if(isset($_GET["erreur"])){
	?>
<script type="text/javascript">
	alert("Merci de spécifier des options valides sur votre bijou !");
$(".couleur").css({
	borderColor : 'red',
});
</script>
<?php 
}
?>