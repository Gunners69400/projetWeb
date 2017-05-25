<?php
require_once('../vendor/autoload.php');
require_once('../model/token.php');
require_once('../model/competition.php');
require_once('../model/connexionBD.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLEPouRPrONos";

//On vérifie que l'utilisateur est connecté
if(!isset($_COOKIE["token"])){
	$menu="menu.php";
	// On le redirige vers la page d'accueil
	Header('Location:/redirection');
}else{
	//On décode le token
	$decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
	$decoded_array = (array) $decoded;

	if (verificationToken($decoded_array)){
		if($decoded_array['role']==="joueur"){
			//Si c'est un joueur on le redirige vers l'accueil
			Header('Location:/redirection');
		}else if($decoded_array['role']==="admin"){
			//Si c'est un admin on affiche la page
			$menu="menuAdmin.php";
			$competition=getCompetition($_GET['idC']);
			include('../view/modifierCompetition.php');
		}else{
			// On le redirige vers la page d'accueil
			Header('Location:/redirection');		
		}
	}else{
		Header('Location:/redirection');
	}
}
?>