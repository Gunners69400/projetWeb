<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Web</title>

    <link href="../assets/css/projetWeb.css" rel="stylesheet">	
	
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../assets/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body id="page-top" class="index">

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
                    <h2>Gestion Matchs</h2>
                    <hr class="star-primary">
					<a href="../controller/ajouterPhase.controller.php?idC=<?php echo $_GET['idC']; ?>&idP=<?php echo $_GET['idP']; ?>"><button type="button" class="btn btn-primary">Ajouter un match</button></a>
				<br /><br />
				<div class="panel panel-success">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Date Match</th>
								<th>Equipe Domicile</th>
								<th>Equipe Extérieur</th>
								<th>cote 1</th>
								<th>cote N</th>
								<th>cote 2</th>
								<th>Résultat</th>
							</tr>
						</thead>
					<?php
					while($donnees=$listeMatchs->fetch()){
						    echo "<tr>";
							echo "<td> $donnees[date_match] </td>";
							echo "<td> $donnees[nom_equipe1] </td>";
							echo "<td> $donnees[nom_equipe2] </td>";
							echo "<td> $donnees[cote_equipe1] </td>";
							echo "<td> $donnees[cote_match_nul] </td>";
							echo "<td> $donnees[cote_equipe2] </td>";
							echo "<td> $donnees[resultat_match] </td>";
							echo "</tr>";
					}						
					?>
					</table>
				</div>
				                </div>
            </div>
        </div>
    </section>

	<?php include("footer.php"); ?>
	
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/freelancer.min.js"></script>

</body>

</html>