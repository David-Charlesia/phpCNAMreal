<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title><?= $pageName ?></title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
		<link rel="stylesheet" href="contents/css/phpcnam.css"/>
        <link rel="stylesheet" href="contents/css/view_map.css"/>
		<link rel="stylesheet" href="contents/css/map.css"/>
        <link rel="stylesheet" href="contents/css/results.css"/>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="?controller=search" >Page de recherche</a></li>
				<li><a href="?controller=map&action=map" >Carte</a></li>
				<li><a href="?controller=myspace" >Mon espace</a></li>
				<li><a href="?controller=admin" >Espace administrateur</a></li>
				<li><a href="?controller=sign&action=signout">Se déconnecter</a></li>
			</ul>
		</nav>