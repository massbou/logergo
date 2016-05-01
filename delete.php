<div id="suppr">
    <i class="ion-close login-close"></i>
    <h1> Suppression <br>
    </h1>
    <?php
    	$requete2='SELECT * FROM actualite where id='.$_SESSION["recoi"]["id"].'';
		$req2=mysqli_query($conn,$requete2);
	    if(!$req2){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    }
    	if(mysqli_num_rows($req2)>0){
    		$_SESSION["recvmod"]=mysqli_fetch_assoc($req2);
    	}
    ?>
    <p> Etes vous sûr de vouloir supprimer l'article suivant  " <?php echo $_SESSION["recoi"]["titre"]?> " ?</p>
    <form class="form-del" method="post">
        <div class="validerform">
            <input type="submit" value="Oui" name="valider" class="validerform-btn"></input>
        </div>
        <a href="./index.php" class="annuler-del"> NON </a>
    </form>
</div>
<?php
	if(isset($_POST["valider"]))
	{
		$requete='Delete FROM actualite WHERE id='.$_SESSION["recoi"]["id"].'';
		$req=mysqli_query($conn,$requete);

    	if(!$req){
	        echo "Il y a un problème à la connexion!";
	        exit();
    	}
        session_unset();
		session_destroy();
        header('location: index.php');
		exit();
	}
?>
