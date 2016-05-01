<?php
    ini_set('mysql.connect_timeout', 300);
    ini_set('default_socket_timeout', 300);
    include('includes/connec_db.php');
    include('includes/fonction.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>BOUNEFFA 11310939 - ABEBE 1311388 </title>
        <link rel="stylesheet" type="text/css" href="./css/formulaire.css" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,600italic,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

    </head>
    <body>
        <?php
            if(isset($_POST['valider']))
            {
                if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['email'])&&!empty($_POST['titre'])&&!empty($_POST['description'])&&!empty($_POST['categorie']))
                {
                    if(getimagesize($_FILES['fichier_image']['tmp_name'])==FALSE)
                    {
                        echo "choisir une image!";
                    }
                    else
                    {

                        $nom=mysqli_real_escape_string($conn,$_POST['nom']);
                        $nom=securite_entree($nom);
                        $prenom=mysqli_real_escape_string($conn,$_POST['prenom']);
                        $prenom=securite_entree($prenom);
                        $email=mysqli_real_escape_string($conn,$_POST['email']);
                        $email=securite_entree($email);
                        $categorie=mysqli_real_escape_string($conn,$_POST['categorie']);
                        $categorie=securite_entree($categorie);
                        $titre=mysqli_real_escape_string($conn,$_POST['titre']);
                        $titre=trim($titre);
                        $description=mysqli_real_escape_string($conn,$_POST['description']);
                        $description = trim($description);
                        //$description = stripslashes($description);
                        //$description=$_POST['description'];
                        $uploadOk=1;
                        $target_dir = "pics/";
                        $target_file = $target_dir . basename($_FILES["fichier_image"]["name"]);
                        $type_fichier = pathinfo($target_file,PATHINFO_EXTENSION);
                        $fichier_image=addslashes($_FILES['fichier_image']['tmp_name']);
                        $name=addslashes($_FILES['fichier_image']['name']);
                        if (file_exists($target_file))
                        {
                            echo "Veuillez renomer votre fichier ou fichier existe deja.";
                            $uploadOk = 0;
                        }
                        if ($_FILES["fichier_image"]["size"] > 5000000)
                        {
                            echo "Fichier dépasse les 5Mo.";
                            $uploadOk = 0;
                        }
                        if($type_fichier != "jpg" && $type_fichier != "png" && $type_fichier != "jpeg" && $type_fichier != "gif" &&
                            $type_fichier != "JPG" && $type_fichier != "PNG" && $type_fichier != "JPEG" && $type_fichier != "GIF")
                        {
                            echo "Seul les fichiers JPG, JPEG, PNG et GIF sont acceptés.";
                            $uploadOk = 0;
                        }
                        $requete = "insert into actualite (nom, prenom, email, categorie, titre, description, image_name) values ('$nom','$prenom','$email','$categorie','$titre','$description','$name')";
                        $resultat= mysqli_query($conn,$requete);
                        if($uploadOk==1)
                        {
                            if($resultat)
                            {
                                move_uploaded_file($_FILES["fichier_image"]["tmp_name"], $target_file);
                                echo 'Image uploader ... Vous allez être redirigez vers la page d\'actualité dans quelque instant ...!';
                                sleep(10);
                                header('location: index.php');
                                exit();
                            }
                        }
                        else
                        {
                            echo 'Erreur lors de l\'upload ';
                            sleep(10);
                            header('location: formulaire.php');
                        }
                    }
                }
                else
                {
                    echo "Veuillez remplir tous les cases!";
                }
            }
        ?>
        <h1> Ajout Actualité <br>
        </h1>

        <div class="repart-acc">
            <a href="./index.php">
                <i class="ion-android-arrow-back"></i>
                <span> Actualités </span>
            </a>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="titre first">
                <label for="doge" class="titre-label">Nom</label>
                <input type="text" name="nom" class="titre-input">
            </div>

            <div class="titre">
                <label for="doge" class="titre-label">Prenom</label>
                <input type="text" name="prenom" class="titre-input">
            </div>

            <div class="titre">
                <label for="doge" class="titre-label">Email</label>
                <input type="email" name="email" class="titre-input">
            </div>

            <div class="liste">
                <select id="liste" class="liste-sel" name="categorie">
                    <option class="test" val="">Categories</option>
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
                <input type="text" name="titre" class="titre-input">
            </div>



            <div class="desc">
                <label for="description" class="desc-label">Description</label>
                <textarea class="desc-text" name="description" onkeyup="adjust_textarea(this)"></textarea>
            </div>

            <div class="image">
                <input type="file" name="fichier_image" id="image" class="image-input" accept="image/*" data-multiple-caption="{count} images choisies" multiple />
                <label class="image-label" for="image"><span>Choisir Image<span></label>
            </div>

            <div class="valider">
                <input type="submit" value="Valider" name="valider" class="valider-btn"></input>
            </div>
        </form>
    </body>
    <script  language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">></script>
    <script language="JavaScript" type="text/javascript" src="./js/min/fonction.min.js"></script>
</html>
