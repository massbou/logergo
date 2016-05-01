<div class="popup">
    <i class="ion-close"></i>
    <div class="actu-container">
        <h1><?php echo $_SESSION["recoi"]["titre"]; ?></h1>
        <div>
            <div class="actu-img">
                <img src="./pics/<?php echo $_SESSION["recoi"]["image_name"];?>">
            </div>
            <p>
                <?php echo $_SESSION["recoi"]["description"];?>
            </p>
            <span class="date">
                <?php echo $_SESSION["recoi"]["date_heure"];?>
            </span>
            <span class="auteur">
                <?php echo $_SESSION["recoi"]["prenom"];?>
                <?php echo $_SESSION["recoi"]["nom"];?>
            </span>

        </div>
    </div>
</div>
