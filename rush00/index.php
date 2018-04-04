<?PHP
  session_start();
  include_once("func_utils.php");
?>
<html>
<head>
	<title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<ul id="menu">
		<li class="bouton_gauche"><a href="index.php">Accueil</a></li>
		<li class="bouton_gauche"><a href="produits.php">Produits</a></li>
		<li class="bouton_gauche"><a href="categories.php">Categories</a></li>
		<li class="bouton_droite"><a href="panier/index.php">Panier</a></li>
		<li class="bouton_droite">
			<?PHP
            if (is_connected() === TRUE)
            {
                echo '<a href="login/logout.php">
                Deconnexion';
            }
            else
            {
                echo '<a href="login/connexion_html.php">
                Connexion';
            }
			?>
		</a></li>
			<?PHP
			if (isset($_SESSION['privilege']))
			{
				if ($_SESSION['privilege'] === "admin")
				{
					?>
					<li class="bouton_droite">
					<?php
					echo '<a href="administration/index.php">
					Administration';
					?>
					</a></li>
					<?php
				}
			}
			?>



	</ul>

	<div style="text-align:center">
		BIENVENUE DANS LE PLUS PETIT SITE D'ACHAT EN LIGNE D'ANIMAUX
		<br />
		VOUS TROUVEREZ TRES PEU DE CHOIX CHEZ NOUS
		<br />
		MAIS DES PRODUITS AUX COULEURS TRES ATYPIQUES
		<br />
		ou pas
		<br />
		<br />
		<br />
		DANS NOTRE MENU
		<br />
		Cliquez sur Produits pour voir TOUS nos produits
		<br />
		Cliquez sur Catégories pour voir nos produits selon vos critères
		<br />
		<br />
		ET OUI C'EST MAGIQUE VOUS POUVEZ FAIRE VOTRE PANIER MEME SANS ETRE CONNECTE !!!

	</div>



</body>
</html>
