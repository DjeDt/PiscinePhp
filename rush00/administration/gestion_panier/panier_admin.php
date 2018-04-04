<?php
	session_start();
	if (!isset($_SESSION) ||
		!isset($_SESSION['loggued_on_user']) ||
		!isset($_SESSION['privilege']) ||
		$_SESSION['privilege'] == null ||
		$_SESSION['privilege'] !== "admin")
		{
			header("Location:../index.php");
		}
?>
<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="administration.css">
	<body>
		<div style="text-align:center">
			BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
		</div>
		<ul id="menu" class="menu">
			<li class="bouton_gauche"><a href="../index.php">Accueil</a></li>
		<br />
				<li class="bouton_droite">
					Articles
					<ul class="menu_type">
						<li>
							<a href="articles/ajouter_article_html.php">
							Ajouter un article
						</li>
						<li>
							<a href="articles/modifier_article_html.php">
							Modifier un article
						</li>
						<li>
							<a href="articles/supprimer_article_html.php">
							Supprimer un article
							</a>
						</li>
					</ul>
				</li>
				<li class="bouton_droite">
					Catégories
					<ul class="menu_type">
						<li>
							<a href="categories/ajouter_categorie_html.php">
							Ajouter une catégorie
						</li>
						<li>
							<a href="categories/modifier_categorie_html.php">
							Modifier une catégorie
						</li>
						<li>
							<a href="categories/supprimer_categorie_html.php">
							Supprimer une catégorie
						</a>
						</li>
					</ul>
				</li>
				<li class="bouton_droite">
					Utilisateurs
					<ul class="menu_type">
						<li>
							<a href="utilisateurs/ajouter_utilisateur_html.php">
							Ajouter un utilisateur
						</li>
						<li>
							<a href="utilisateurs/modifier_utilisateur_html.php">
							Modifier un utilisateur
						</li>
						<li>
							<a href="utilisateurs/supprimer_utilisateur_html.php">
							Supprimer un utilisateur
						</a>
						</li>
					</ul>
				</li>
		</ul>

	</body>
</html>
