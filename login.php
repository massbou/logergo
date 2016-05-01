<div class="login-container--<?php echo $_SESSION["recoi"]["id"] ?>">
	<i class="ion-close login-close"></i>
	<div class="login-header">
		<h1>Veuillez-vous connecter</h1>
	</div>
	<div class="login-content">
			<div class="champ">
                <label for="username" class="champ-label">Identifiant</label>
                <input type="text" name="username" class="champ-input" id="user">
				<div class="aide">
					<i class="ion-help"></i>
					<span class="aide-txt">demo</span>
				</div>
            </div>

			<div class="champ">
                <label for="password" class="champ-label" >Mot de Passe</label>
                <input type="password" name="password" class="champ-input" id="mdp">
				<div class="aide">
					<i class="ion-help"></i>
					<span class="aide-txt">123456</span>
				</div>
            </div>

			<div class="valider">
                <input type="submit" value="Valider" name="submit" class="valider-btn"></input>
            </div>
	</div>
</div>
