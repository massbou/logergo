<div id="modifi" class="<?php echo $_SESSION["recoi"]["id"] ?>">
    <i class="ion-close login-close"></i>
    <h1> Modifier votre actualité <br>
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
    <form method="post">
        <div class="titre first">
            <label for="doge" class="titre-label">Nom</label>
            <input type="text" name="nom" class="titre-input" value = '<?php echo $_SESSION["recvmod"]["nom"]; ?>' >
        </div>

        <div class="titre">
            <label for="doge" class="titre-label">Prenom</label>
            <input type="text" name="prenom" class="titre-input" value='<?php echo $_SESSION["recvmod"]["prenom"]; ?>'>
        </div>

        <div class="titre">
            <label for="doge" class="titre-label">Email</label>
            <input type="email" name="email" class="titre-input" value='<?php echo $_SESSION["recvmod"]["email"]; ?>'>
        </div>

        <div class="liste">
            <select id="liste" class="liste-sel" name="categorie">
            	<option selected enabled><?php echo $_SESSION["recvmod"]["categorie"]; ?></option>
                <optgroup label="Enseignement" name="l1">
                    <option name="Forum" value="Forum">Forum</option>
                    <option name="Tutorat" value="Tutorat">Tutorat</option>
                </optgroup>
                <optgroup label="Arts et Musiques">
                    <option name="Orchestre" value="Orchestre">Orchestre</option>
                    <option name="Dance" value="Dance">Dance</option>
                    <option name="Peinture" value="Peinture">Peinture</option>
                </optgroup>
                <optgroup label="Sport">
                    <option name="Football" value="Football">Football</option>
                    <option name="BasketBall" value="Basket Ball">Basket Ball</option>
                    <option name="VolleyBall" value="VolleyBall">VolleyBall</option>
                </optgroup>
                <optgroup label="Loisir">
                    <option name="Cuisine" value="Cuisine">Cuisine</option>
                    <option name="Cinema" value="Cinema">Cinema</option>
                    <option name="Theatre" value="Theatre">Theatre</option>
                </optgroup>
            </select>
        </div>

        <div class="titre">
            <label for="doge" class="titre-label">Titre</label>
            <input type="text" name="titre" class="titre-input" value='<?php echo $_SESSION["recvmod"]["titre"]; ?>' maxlength="12">
        </div>

        <div class="desc">
            <label for="description" class="desc-label">Description</label>
            <textarea class="desc-text" name="description" onkeyup="adjust_textarea(this)" ><?php echo $_SESSION["recvmod"]["description"];?></textarea>
        </div>

        <div class="image">
            <input type="file" name="image" id="image" class="image-input" accept="image/*" data-multiple-caption="{count} images choisies" multiple />
            <label class="image-label" for="image"><span><?php echo $_SESSION["recvmod"]["image_name"];?><span></label>
        </div>

        <div class="validerform">
            <input type="submit" value="Valider" name="valider" class="validerform-btn"></input>
        </div>
    </form>
</div>
<?php
	if(isset($_POST["valider"]))
	{
		if(isset($_POST["nom"])){
			$requete='UPDATE actualite SET nom="'.$_POST["nom"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}
		if(isset($_POST["prenom"])){
			$requete='UPDATE actualite SET prenom="'.$_POST["prenom"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}
		if(isset($_POST["email"])){
			$requete='UPDATE actualite SET email="'.$_POST["email"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}
		if(isset($_POST["categorie"])){
			$requete='UPDATE actualite SET categorie="'.$_POST["categorie"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}
		if(isset($_POST["titre"])){
			$requete='UPDATE actualite SET titre="'.$_POST["titre"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}
		if(isset($_POST["description"])){
			$requete='UPDATE actualite SET description="'.$_POST["description"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}

        if(isset($_POST["image_name"])){
			$requete='UPDATE actualite SET image_name="'.$_POST["image_name"].'" where id='.$_SESSION["recoi"]["id"].'';
			$req=mysqli_query($conn,$requete);

	    	if(!$req){
		        echo "Il y a un problème à la connexion!";
		        exit();
	    	}
		}

        // $target_dir = "pics/";
        // $target_file = $target_dir . basename($_FILES["fichier_image"]["name"]);
        // $type_fichier = pathinfo($target_file,PATHINFO_EXTENSION);
        // move_uploaded_file($_FILES["fichier_image"]["tmp_name"], $target_file);
        session_unset();
		session_destroy();
        header('location: index.php');
		exit();
	}
?>
