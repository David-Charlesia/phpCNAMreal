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
			</ul>
		</nav>


        <?= print_r($usersToValidate) ?>
        <table id="tableau_to_validate">
            <tr>
                <th>Pseudo</th>
                <th>email</th>
                <th>Privilège</th>
                <th>Validé ?</th>
            </tr>

            <?php

                foreach ($usersToValidate as $user) {
                    
            ?>

                    <tr>
                        <th><?=$user["pseudo"];?></th>
                        <th><?=$user["email"];?></th>
                        <th><?php echo ($user["privilege"]==2) ? 'Contributeur':'admin' ;?></th>
                        <th>
                            <form action="?controller=admin&action=validate" method="post">
                                <input name="id_user" type="hidden" value="<?= $user["id"] ?>"/>
                                <button name="validate" type="submit" value="ok">Valider</button>
                                <button name="validate" type="submit" value="nope">Décliner</button>
                            </form>
                        </th>
                    </tr>
                
            <?php
                }
            ?>


        </table>
        


    </body>
</html>