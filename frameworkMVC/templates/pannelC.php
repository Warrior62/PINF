<head>
	<title>Pannel Commentaires</title>
</head>
<script>
	/*
	 * Cette fonction permet de supprimer un commentaire avec une vérification à l'aide de son id en faisant appel à la fonction deleteCommentaire($id) dans le modele.php
	 */
	function supprimerCommentaire(id){
		//console.log("idUser = " + id);
		if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')){
  			console.log("Tu as cliqué sur oui / l'idUser cliqué est : " + id);
  			document.cookie="id="+id;
			  <?php if(isset($_COOKIE["id"]))
				  updateCommentaire($_COOKIE["id"]);
  			?>
  			window.location.reload(true);
  		}
  		else{
  			console.log("Tu as cliqué sur non / l'idUser cliqué est : " + id);
  		}
	}
		
</script>


	<div class="row text-center mt-5 mb-5 w-75" style="margin:auto">
		<div class="col-4">
			<hr class="w-50">
		</div>
		<div class="col-4">
			<p class="h4 text-center">Voici la liste des différents commentaires</p>
		</div>
		<div class="col-4">
			<hr class="w-50">
		</div>
	</div>
	
	<div id="divCommentaires" style="padding-left: 10px;padding-right:10px;">
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">Identifiant utilisateur</th>
					<th scope="col">Pseudo</th>
					<th scope="col">Commentaire</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<?php 
				$commentaire=getCommentaire();
				for ($i=0;$i<count($commentaire);$i++){
					if( $commentaire[$i]["commentaire"]!="" ){
						echo("<tr>
								<th scope='row'>" . $commentaire[$i]['idUser'] . "</th>
							<td>" . $commentaire[$i]['username'] . "</td>
							<td>" . $commentaire[$i]['commentaire'] . "</td>
							<td><input class='btn btn-outline-danger' type='button' name='Supprimer' value='Supprimer' id='" . $commentaire[$i]['idUser'] . "' onclick='supprimerCommentaire(this.id);'/></td>
							</tr>"
						);
					}
				}
			?>
		</table>
	</div>



