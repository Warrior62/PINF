<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=reparationBijoux");
	die("");
}
 ?>

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
	 	<form action="controleur.php" method="GET">
	 		<!--<?php echo "<input type=\"hidden\" name=\"idUser\" value=".$_SESSION["idUser"].">"?>-->
	 		<fieldset id="bijou">
	 					<div class="form-group">
	 					<label for="type">Type de bijou</label>
	 					<select class="form-control" id="type" name="select_type">
	 						<option selected>Veuillez sélectionner une option</option>
	 						<?php
									$tableauType=getTypeBijou();
									tprint($tableauType);
									foreach ($tableauType as $nextTab )
									{
										$idType = $nextTab["idType"];
										echo $idType;
										$descType = $nextTab["descType"];
										echo $descType;
										echo "<br/>";
										echo "<option name=". $idType .">". $descType ."</option>";
									}

							?>
	 					</select>
	 				</div>
	 					<br/>
	 					<div class="form-group">
	 					<label for="matiere">Matière</label>
	 					<select class="form-control" id="matiere" name="select_matiere">
	 						<option selected>Veuillez sélectionner une option</option>

	 						<?php
									$tableauMatiere=getMatiere();
									tprint($tableauMatiere);
									foreach ($tableauMatiere as $nextTab )
									{
										$idMatiere = $nextTab["idMatiere"];
										echo $idMatiere;
										$descMatiere = $nextTab["descMatiere"];
										echo $descMatiere;
										echo "<br/>";
										echo "<option name=". $idMatiere .">". $descMatiere ."</option>";
									}

							?>

	 					</select>
	 				</div>
	 					<br/>
	 					<div class="form-group">
	 					<label for="probleme">Problème(s) sur le bijou</label>
	 					<textarea class="form-control" id="probleme" name="problemeBijou" rows="3"></textarea>
	 				</div>
	 		</fieldset>
	 		<fieldset id="rendez-vous">
	 			<div class="form-group">
	 				<label for="inputDate">Prendre un rendez-vous</label>
	 				<input type="date" name="" id="inputDate"class="form-control" required/>

	 			</div>
	 		</fieldset>

	 		<input type="submit" value="Valider" name="action" class='btn btn-block w-50 text-light bg-dark mt-5'/>
	 	</form>
	 </div>
	 <div class="col-7">
	 	<!--IMAGE-->
	 	<img src="./ressources/photoReparationBijou.jpg" alt="photoReparationBijou" class="w-100 img-fluid rounded mt-5 ml-5"/>
	 </div>
	</div>
 </div>
