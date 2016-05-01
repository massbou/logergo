<?php
function securite_entree($entree) {
  $entree = trim($entree);
  $entree = stripslashes($entree);
  $entree = htmlspecialchars($entree);
  return $entree;
}

function chooseClasse($entree){
	if($entree=='Forum' || $entree=='Tutorat')
	{
		$resultat='enseignement';
		return $resultat;
	}
	elseif ($entree=='Orchestre' || $entree=='Dance' || $entree=='Peinture') {
		$resultat='loisirs';
		return $resultat;
	}
	elseif ($entree=='Football' || $entree=='Basket Ball' || $entree=='VolleyBall') {
		$resultat='sports';
		return $resultat;
	}
	elseif ($entree=='Cuisine' || $entree=='Cinema' || $entree=='Theatre') {
		$resultat='art-musique';
		return $resultat;
	}
}

function checkLogin($user, $mdp){
	if($user=='demo' && $mdp=='123456'){
	}
	else{
		echo "Login ou mot de passe erronée!";
	}
}

function uploadData($var,$conn){
	if(isset($var)){
			$requete='UPDATE actualite SET name='.$var.'where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);
	    	
	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}		
		}
}
?>