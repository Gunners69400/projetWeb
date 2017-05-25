<?php
require_once('../vendor/autoload.php');
require_once('../model/token.php');
require_once('../model/admin.php');
require_once('../model/connexionBD.php');
use \Firebase\JWT\JWT;

//TODO: mettre dans un fichier .env
$key = "ceSera1cLEPouRPrONos";

//On vérifie que l'utilisateur est connecté
if(!isset($_COOKIE["token"])){
	// On le redirige vers la page d'accueil
	Header('Location:/redirection');
}else{
	//On décode le token
	$decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
	$decoded_array = (array) $decoded;
	//On vérifie le contenu du token
	if (verificationToken($decoded_array)){
		if($decoded_array['role']==="joueur"){
			//Si c'est un joueur on le redirige
			Header('Location:/redirection');
		}else if($decoded_array['role']==="admin"){
			//Si c'est un admin on supprime l'admin et on le redirige vers la page admins
			supprimerAdmin($_GET['idA']);
			Header('Location:/admins');
		}else{
			Header('Location:/redirection');	
		}
	}else{
		Header('Location:/redirection');
	}
}
?>