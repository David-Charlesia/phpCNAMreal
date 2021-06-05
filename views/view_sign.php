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
                    <input id="password" type="password" placeholder="mot de passe" name="password" required onkeyup="verifyPassword()"/>
                    <input id="password2" type="password" placeholder="retaper le mot de passe" name="password2" required onkeyup="verifyPassword()"/>
                    <select name="level" id="level">
                        <option value="">--Choisisez un statut--</option>
                        <option value="3">Normal</option>
                        <option value="2">Contributeur</option>
                        <option value="1">Administrateur</option>
                    </select>
                    <input id="submit" type="submit" value="Créer un compte" disabled/>
                    <script>
                        const password = document.getElementById("password");
                        const password2 = document.getElementById("password2");
                        const submit = document.getElementById("submit");

                        function verifyPassword() {
                            if(password.value != "" && password.value == password2.value) {
                                submit.removeAttribute("disabled");
                            }else{
                                submit.setAttribute("disabled",true);
                            }
                        }

                    </script>
                </form>
            </div>
        </div>

    </body>
</html>