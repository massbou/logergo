<?php
    include('includes/connec_db.php');
    include('includes/fonction.php');
?>
<!doctype html>
<html>
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/style.css" />
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,900' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    </head>
<body>
    <h1 class="title"> Actualités <br>
    </h1>

    <div class="ajout-acc">
        <a href="./formulaire.php">
            <i class="ion-plus-round"></i>
            <span> Ajouter </span>
        </a>
    </div>
    <?php
        $requete="SELECT * FROM actualite ORDER BY date_heure DESC";
        $req=mysqli_query($conn,$requete);
        if(!$req){
            echo "Il y a un problème à la connexion!";
            exit();
        }
        session_start();
        if(mysqli_num_rows($req)>0){
            while($_SESSION["recoi"]=mysqli_fetch_assoc($req)){
            $_SESSION["classes"]=chooseClasse($_SESSION["recoi"]["categorie"]); /*$_SESSION["recoi"]["image_name"]*/
            echo '<div class="actu '.$_SESSION["classes"].'" style="background-image: url(\'./pics/'.$_SESSION["recoi"]["image_name"].'\'); background-size : cover;
            background-position: center center">
            <div class="title-container">
                <p class="title">
                    <h1>'.$_SESSION["recoi"]["titre"].'</h1>
                    <h3>'.$_SESSION["recoi"]["categorie"].'</h3>
                </p>
                <div class="actu-options">
                    <div class="voir-actu">
                        <h3>VOIR</h3>
                            <i class="ion-eye"></i>
                    </div>';
                    include('popup.php');?>
                <div class="other-opt">
                        <div class="edit-actu" id="<?php echo $_SESSION["recoi"]["id"] ?>">
                            <h3>MODIFIER</h3>
                            <i class="ion-edit"></i>
                        </div>
                        <div class="suppr-actu">
                            <h3>SUPPRIMER</h3>
                            <i class="ion-android-delete"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        include('modify.php');
        include('delete.php');
        include('login.php');
        include('logindel.php');
        }
        }
    ?>
    <script  language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">></script>
    <script src="js/functions.js"></script>
    <script src="js/min/fonction.min.js"></script>
</body>
</html>
