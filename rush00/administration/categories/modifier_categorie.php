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
<?php
require_once '../check_chaine.php';

	if (isset($_POST['old_article_categorie']) AND isset($_POST['new_article_categorie']))
	{
		if (!file_exists("../../produits/produits_liste"))
		{
			echo 'product_list can\'t be found, contact administrator';
			return ;
		}
		$produit_liste_unserialize = unserialize(file_get_contents('../../produits/produits_liste'));
		$exist = 0;
		if ($produit_liste_unserialize)
		{
			foreach ($produit_liste_unserialize as $key => &$value)
			{
				if (isset($value['article_categorie']))
				{
					if ($value['article_categorie'] === nettoyerChaine($_POST['old_article_categorie']))
					{
						$exist = 1;
						$value['article_categorie'] = nettoyerChaine($_POST['new_article_categorie']);
						$produit_liste = serialize($produit_liste_unserialize);
						file_put_contents("../../produits/produits_liste", $produit_liste);
					}
				}
			}
		}
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
			CATEGORIES - MODIFICATION
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
		<?php
		if (isset($exist))
		{
			if ($exist === 1)
			{
			?>
			<div style="text-align:center">
				CHANGEMENT DE NOM EFFECTUE
				<form method="POST" action="../index.php">
					<input type="submit" value="Return" name="return" action="../index.php" />
				</form>
			</div>
			<?php
		}
		}
		else
		{
			?>
			<div style="text-align:center">
				ERROR
				<form method="POST" action="../index.php">
					<input type="submit" value="Return" name="return" action="../index.php" />
				</form>
			</div>
			<?php
		}
		?>
	</body>
</html>
