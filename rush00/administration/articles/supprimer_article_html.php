<?PHP
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
	<link rel="stylesheet" type="text/css" href="../../index.css">
	<link rel="stylesheet" type="text/css" href="../administration.css">
	<body>
		<div style="text-align:center">
			BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
			<br />
			ARTICLES - SUPPRESSION
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
		<div style="text-align:center">
			ARTICLES DEJA EXISTANTS
			<br />
			<?php
				if (!file_exists("../../produits/produits_liste"))
				{
					echo 'product_list can\'t be found, contact administrator';
					return ;
				}
				$account = unserialize(file_get_contents('../../produits/produits_liste'));
				if ($account)
				{
					$categorie = [];
					foreach ($account as $key => $value)
					{
						if (array_search($value['article_nom'], $categorie) === FALSE)
						{
							array_push($categorie, $value['article_nom']);
							echo $value['article_nom'] . " ";
						}
					}
				}
			?>
			<br />
			<br />
			<form method="POST" action="supprimer_article.php">
				<div>
					INFORMATION : Ne mettez pas d'espaces
					<br />
					Nom de l'article à supprimer : <input type="text" name="article_nom" value=""/>
				</div>
				<input type="submit" name="submit" value="OK"/>
			</form>
		</div>
	</body>
</html>
