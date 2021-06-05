<?php require('views/view_begin.php'); ?>

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

            <input type="text" placeholder="ville" name="city" id="ville" class="input" required/>
            <input type="submit" value="Rechercher par ville"/>

        </form>

		<form action="index.php?controller=results&action=results" method="post">

            <input type="date" placeholder="date" name="date" id="date" class="input" required/>
            <input type="submit" value="Rechercher par date"/>

        </form>

		<form action="index.php?controller=results&action=results" method="post">

            <input type="number" placeholder="année" name="year" id="year" class="input" required/>
            <input type="submit" value="Rechercher par année"/>

        </form>

        </main>

<?php require('views/view_end.php'); ?>