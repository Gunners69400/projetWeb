<?php
require_once('../vendor/autoload.php');
require_once('../model/token.php');
require_once('../model/phase.php');
require_once('../model/connexionBD.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLEPouRPrONos";

//On vérifie que l'utilisateur est déjà connecté
if(!isset($_COOKIE["token"])){
	$menu="menu.php";
	// On le redirige vers la page d'accueil
	Header('Location:/redirection');
}else{
	//On décode le token
	$decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
	$decoded_array = (array) $decoded;
	//On vérifie le contenu du token
	if (verificationToken($decoded_array)){
		if($decoded_array['role']==="joueur"){
			//Si c'est un joueur on le redirige vers l'accueil
			Header('Location:/redirection');
		}else if($decoded_array['role']==="admin"){
			//Si c'est un admin on récupère les informations de la phase et on affiche la page
			$menu="menuAdmin.php";
			$phase=getPhase($_GET['idP']);
			include('../view/modifierPhase.php');
		}else{
			// On le redirige vers la page d'accueil
			Header('Location:/redirection');		
		}
	}else{
		Header('Location:/redirection');
	}
}
?>