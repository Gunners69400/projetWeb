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
                    <h2>Gestion Admins</h2>
                    <hr class="star-primary">
				<a href="../controller/ajouterAdmin.controller.php"><button type="button" class="btn btn-primary">Ajouter un admin</button></a>
				<a href="../controller/modifierMdpAdmin.controller.php"><button type="button" class="btn btn-warning">Modifier mon mot de passe</button></a>
				<a href="../controller/modifierEmailAdmin.controller.php"><button type="button" class="btn btn-warning">Modifier email</button></a>
				<br /><br />
				<div class="panel panel-success">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Pseudo</th>
								<th>email</th>
								<th>Supprimer</th>
							</tr>
						</thead>
					<?php
					while($donnees=$listeAdmins->fetch()){
						    echo "<tr>";
							echo "<td>$donnees[pseudo_admin]</td>";
							echo "<td>$donnees[email_admin]</td>";
							echo "<td><a href=\"../controller/supprimerAdmin.controller.php?pseudo=$donnees[pseudo_admin]\"><button type=\"button\" class=\"btn btn-danger\">Supprimer</button></a></td>";
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