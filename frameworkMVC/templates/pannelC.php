<head>
	<title>Pannel Commentaires</title>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<script>
	/*
	 * Cette fonction permet de supprimer un commentaire avec une vérification à l'aide de son id en faisant appel à la fonction deleteCommentaire($id) dans le modele.php
	 */
	function supprimerCommentaire(id){
		if(confirm('Voulez-vous vraiment supprimer ce commentaire ?')){
  			console.log("Tu as cliqué sur oui / l'id cliqué est : " + id);
  			document.cookie = "id="+id;
  			<?php if (isset($_COOKIE["id"])) 
  				deleteCommentaire($_COOKIE["id"]);
  			?>
  			window.location.reload(true);
  		}
  		else{
  			console.log("Tu as cliqué sur non / l'id cliqué est : " + id);
  		}
	}
		
</script>
<style>
	body
	{
		font-family: 'Comfortaa', cursive;
	}
</style>
<body>
	<br>
	<div style="text-align:center;font-size:150%;">------ Voici la liste des différents commentaires ------</div><br><br>
	<div id="divCommentaires" style="padding-left: 10px;padding-right:10px;">
			<table class="table">
			    <thead class="thead-light">
				    <tr>
				        <th scope="col">#</th>
				        <th scope="col">Pseudo</th>
				        <th scope="col">Commentaire</th>
				        <th scope="col"></th>
				    </tr>
			    </thead>
			    <?php 
					$commentaire=getCommentaire();
					for ($i=0;$i<count($commentaire);$i++){
						echo("<tr>
				   	  	  <th scope='row'>" . $commentaire[$i]['idCommentaire'] . "</th>
				      	  <td>" . $commentaire[$i]['username'] . "</td>
				      	  <td>" . $commentaire[$i]['commentaire'] . "</td>
				      	  <td><input class='btn btn-outline-danger' type='button' name='Supprimer' value='Supprimer' id='" . $commentaire[$i]['idCommentaire'] . "' onclick='supprimerCommentaire(this.id);'/></td>
				      	  </tr>"
				        );
					}
				?>
			</table>
	</div>
</body>



