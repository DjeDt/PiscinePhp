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
	<body>
		<div style="text-align:center">
			BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
			<br />
			ARTICLES - AJOUT
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
<?php
require_once '../check_chaine.php';

	if(isset($_POST['submit']))
	{
		if (isset($_POST['article_categorie'])
			&& isset($_POST['article_nom'])
			&& isset($_POST['article_image'])
			&& isset($_POST['article_couleur'])
			&& isset($_POST['article_prix'])
			&& isset($_POST['article_quantite_dispo']))
		{
			if ($_POST['submit'] === "OK"
				AND $_POST['article_categorie'] !== NULL
				AND $_POST['article_nom'] !== NULL
				AND $_POST['article_image'] !== NULL
				AND $_POST['article_couleur'] !== NULL
				AND $_POST['article_quantite_dispo'] !== NULL
				AND $_POST['article_prix'] !== NULL
				AND $_POST['article_categorie'] !== ""
				AND $_POST['article_nom'] !== ""
				AND $_POST['article_image'] !== ""
				AND $_POST['article_couleur'] !== ""
				AND $_POST['article_quantite_dispo'] !== "")
				AND $_POST['article_prix'] !== "")
			{
				if (!file_exists('../../produits'))
				{
					mkdir("../../produits");
				}
				if (!file_exists('../../produits/produits_liste'))
				{
					file_put_contents('../../produits/produits_liste', null);
				}
				$produit_liste = unserialize(file_get_contents('../../produits/produits_liste'));
				$exist = 0;
				$categorie_exist = 0;
				if ($produit_liste)
				{
					foreach ($produit_liste as $key => $value)
					{
						if (isset($value['article_categorie']))
						{
							if ($value['article_categorie'] === nettoyerChaine($_POST['article_categorie']))
								$categorie_exist = 1;
								if (isset($value['article_nom']))
								{
									if ($value['article_nom'] === nettoyerChaine($_POST['article_nom']) AND $value['article_categorie'] === nettoyerChaine($_POST['article_categorie']))
										$exist = 1;
								}
						}
					}
				}
				if ($categorie_exist == 1)
				{
					if ($exist === 0)
					{
						$tmp['article_categorie'] = nettoyerChaine($_POST['article_categorie']);
						$tmp['article_nom'] = nettoyerChaine($_POST['article_nom']);
						$tmp['article_image'] = nettoyerChaine($_POST['article_image']);
						$tmp['article_couleur'] = nettoyerChaine($_POST['article_image']);
						$tmp['article_quantite_dispo'] = nettoyerChaine($_POST['article_image']);
						$tmp['article_prix'] = nettoyerChaine($_POST['article_prix']);
						$produit_liste[] = $tmp;
						file_put_contents('../../produits/produits_liste', serialize($produit_liste));
						?>
						Article correctement ajouté
						<form method="POST" action="../index.php">
							<input type="submit" value="Retour" name="return" action="../index.php" />
						</form>
						<?PHP
					}
					else
					{
						?>
						<div style="text-align:center">
							ERROR
							<form method="POST" action="../index.php">
								<input type="submit" value="Retour" name="return" action="../index.php" />
							</form>
						</div>
						<?PHP
					}
				}
				else
				{
					?>
					<div style="text-align:center">
						ERROR
						<form method="POST" action="../index.php">
							<input type="submit" value="Retour" name="return" action="../index.php" />
						</form>
					</div>
					<?PHP
				}
			}
			else
			{
				?>
				<div style="text-align:center">
					ERROR
					<form method="POST" action="../index.php">
						<input type="submit" value="Retour" name="return" action="../index.php" />
					</form>
				</div>
				<?PHP
			}
		}
		else
		{
			?>
			<div style="text-align:center">
				ERROR
				<form method="POST" action="../index.php">
					<input type="submit" value="Retour" name="return" action="../index.php" />
				</form>
			</div>
			<?PHP
		}
	}
	else
	{
		?>
		<div style="text-align:center">
			ERROR
			<form method="POST" action="../index.php">
				<input type="submit" value="Retour" name="return" action="../index.php" />
			</form>
		</div>
		<?PHP
	}
?>
	</body>
</html>
