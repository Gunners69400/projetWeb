<?php
  require_once('../vendor/autoload.php');
  require_once('../model/token.php');
  require_once('../model/pronostic.php');
  require_once('../model/joueur.php');
  require_once('../model/connexionBD.php');
  use \Firebase\JWT\JWT;

  //TODO: mettre dans un fichier .env
  $key = "ceSera1cLEPouRPrONos";

    //On vérifie que l'utilisateur est déjà connecté
    if(!isset($_COOKIE["token"])){
			$menu="menu.php";
            // On le redirige vers la page d'accueil
            Header('Location:/redirection');
    }
    else{
		
		//On décode le token
      $decoded = JWT::decode($_COOKIE["token"], $key, array('HS256'));
      $decoded_array = (array) $decoded;
	  
	  if (verificationToken($decoded_array)){
		$pseudo=$decoded_array['id'];
        if($decoded_array['role']==="joueur"){
		  $menu="menuJoueur.php";
		  $id=getIdJoueur($pseudo);
		  setProno($_GET['idM'],$_GET['Res'],$id);
          Header('Location:/pronostics');
        }
        else if($decoded_array['role']==="admin"){
		  $menu="menuAdmin.php";
          Header('Location:/redirection');
        }else{
          // On le redirige vers la page admin
		  $menu="menu.php";
          Header('Location:/redirection');	
		}
	  }else{
          Header('Location:/redirection');
	  }
    }
?>