<?php
require_once('../vendor/autoload.php');
require_once('../model/token.php');
require_once('../model/joueur.php');
require_once('../model/connexionBD.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLEPouRPrONos";

//On vérifie que l'utilisateur est connecté
if(!isset($_COOKIE["token"])){
	$menu="menu.php";
	// On le redirige vers la page d'accueil
	Header('Location:../controller/redirection.php');
}else{
	//On décode le token
	$decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
	$decoded_array = (array) $decoded;
	//On vérifie le contenu du token
	if (verificationToken($decoded_array)){
		$pseudo=$decoded_array['id'];
		if($decoded_array['role']==="joueur"){
			//Si c'est un joueur on affiche la page
			$menu="menuJoueur.php";
			include('../view/modifierEmailJoueur.php');
		}else if($decoded_array['role']==="admin"){
			//Si c'est un admin on le redirige vers l'accueil
			Header('Location:../controller/redirection.php');			
		}else{
			// On le redirige vers la page admin
			Header('Location:../controller/redirection.php');		
		}
	}else{
		Header('Location:../controller/redirection.php');
	}
}
?>