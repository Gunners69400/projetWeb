<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projet Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/assets/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body id="page-top" class="index">

	<!-- affichage du menu correspondant au navigateur -->
	<?php 
	if(isset($menu)){
		include($menu);
	}else{
		include('menu.php');
	}?>

	<section id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Pronostics</h2>
					<hr class="star-primary">
					<!-- Création de deux onglets -->
					<ul class="nav nav-tabs">
						<li <?php if(!isset($_GET['mode'])){echo "class=\"active\"";} ?> ><a href="/my-resultats">Terminés</a></li>
						<li <?php if(isset($_GET['mode'])){echo "class=\"active\"";} ?> ><a href="/my-resultats/1">En cours</a></li>
					</ul>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead style="background-color: #5CB85C";>
								<tr>
								<th>Compétition</th>
								<th>Match</th>
								<th>Pronostic</th>
								<!-- Si on est dans l'onglet terminés on affiche une colonne résultat -->
								<?php if(!isset($_GET['mode'])){echo "<th>Résultat</th>";} ?> 
								</tr>
							</thead>
							<tbody>
							<!-- pour chaque pronostic réalisé par le joueur on affiche les informations -->
								<?php
								while($donnees=$listeParis->fetch()){
									echo "<tr>";
									echo "<td> $donnees[nom_competition] <br /> $donnees[libelle_phase] <br /> $donnees[date_rencontre] </td>";
									echo "<td> $donnees[nom_equipe1] - $donnees[nom_equipe2]</td>";
									//Si il existe un résultat pour le match du joueur, on colorie le prono du joueur en vert ou rouge 
									if(isset($donnees['resultat_rencontre'])){
										if($donnees['resultat_rencontre']===$donnees['prono_joueur']){
											echo "<td style=\"background-color: #90EE90\">";
										}else{
											echo "<td style=\"background-color: #E9967A\">";
										}
									}else{
										echo "<td>";
									}
									//affichage prono du joueur
									if($donnees['prono_joueur']==="1"){
										echo "$donnees[nom_equipe1]<br />($donnees[cote_equipe1])</td>";									
									}else if($donnees['prono_joueur']==="N"){
										echo "Match nul<br />($donnees[cote_nul])</td>";									
									}else if($donnees['prono_joueur']==="2"){
										echo "$donnees[nom_equipe2]<br />($donnees[cote_equipe2])</td>";									
									}else{
										echo "</td>";								
									}
									//Si on est dans l'onglet terminé, on affiche le résultat du match
									if(!isset($_GET['mode'])){
										if(is_null($donnees['resultat_rencontre'])){

										}else{
											if($donnees['resultat_rencontre']==="1"){
												echo "<td > $donnees[nom_equipe1]<br />($donnees[cote_equipe1])</td>";									
											}else if($donnees['resultat_rencontre']==="N"){
												echo "<td> Match nul<br />($donnees[cote_nul])</td>";									
											}else if($donnees['resultat_rencontre']==="2"){
												echo "<td> $donnees[nom_equipe2]<br />($donnees[cote_equipe2])</td>";									
											}else{
												echo "<td></td>";								
											}							
										}
									}
									echo "</tr>";
								}						
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include("footer.php"); ?>

	<!-- jQuery -->
	<script src="/vendor/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Theme JavaScript -->
	<script src="/js/freelancer.min.js"></script>

</body>

</html>
