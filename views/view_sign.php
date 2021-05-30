<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title>Connexion/Créer son compte</title>
		<link rel="stylesheet" href="contents/css/phpcnam.css"/>
        <link rel="stylesheet" href="contents/signin.css"/>
	</head>
	<body>
		<nav>
			<ul>
            <li><a href="?controller=home" >Page de recherche</a></li>
				<li><a href="?controller=map&action=map" >Carte</a></li>
				<li><a href="?controller=sign">Se connecter/Créer un compte</a></li>
			</ul>
		</nav>

        <div id=forms>
            <div class="form">
                <h2>Connexion : </h2>
                <form action="?controller=sign&action=signin" method="post">
                    <?php
                        if(isset($retry)){
                            print "<p>Pseudo ou mot de passe erronné, veuillez réessayer :</p>";
                        }
                    ?>
                    <input type="text" placeholder="pseudo" name="pseudo" required/>
                    <input type="password" placeholder="password" name="password" required/>
                    <input type="submit" value="Connexion"/>
                </form>
            </div>

            <div class="form">
                <h2>Créer un compte : </h2>
                <form action="?controller=sign&action=signup" method="post">
                    <input type="text" placeholder="pseudo" name="pseudo" required/>
                    <input type="email" placeholder="email" name="email" required/>
                    <input type="password" placeholder="mot de passe" name="password" required/>
                    <input type="password" placeholder="retaper le mot de passe" name="password2" required/>
                    <select name="level" id="level">
                        <option value="">--Choisisez un statut--</option>
                        <option value="3">Normal</option>
                        <option value="2">Contributeur</option>
                    </select>
                    <input type="submit" value="Créer un compte"/>
                </form>
            </div>
        </div>

    </body>
</html>