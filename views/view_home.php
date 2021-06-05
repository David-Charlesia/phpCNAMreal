<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title>Accueil</title>
		<link rel="stylesheet" href="contents/css/phpcnam.css"/>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="?controller=search" >Page de recherche</a></li>
				<li><a href="?controller=map&action=map" >Carte</a></li>
				<li><a href="?controller=sign&action=signout">Se déconnecter</a></li>
				<li><a href="?controller=admin">Admin</a></li>
			</ul>
		</nav>

		<header>
			<h1><a href="?"> PHP CNAM </a></h1>
            <h2>Site de recherche de spectacle</h2>
			<p>Bienvenue <?php
				if(isset($_COOKIE['pseudo'])){
					print $_COOKIE['pseudo'];
				}else{
					print $pseudo;
				}
			?></p>
		</header>

		<main>

        <form action="index.php?controller=results&action=results" method="post">

            <input type="text" placeholder="ville" name="city" id="ville" required/>
            <input type="submit" value="Rechercher"/>

        </form>


        </main>
</body>
</html>