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

	$exist = 0;
	$modification = 0;
	if (isset($_POST['article_nom']))
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
			foreach ($produit_liste_unserialize as $key => $value)
			{
				if (isset($value['article_nom']))
				{
					if ($value['article_nom'] === nettoyerChaine($_POST['article_nom']))
					{
						$exist = 1;
						$produit_choisi = $value;
						break;
					}
				}
			}
		}
	}
	$modif_categorie = 0;
	if (isset($_POST['modif_categorie']))
	{
		if (nettoyerChaine($_POST['modif_categorie']) !== null and nettoyerChaine($_POST['modif_categorie']) !== "")
		{
			$modif_categorie = 1;
		}
	}
	$modif_image = 0;
	if (isset($_POST['modif_image']))
	{
		if (nettoyerChaine($_POST['modif_image']) !== null and nettoyerChaine($_POST['modif_image']) !== "")
		{
			$modif_image = 1;
		}
	}
	$modif_couleur = 0;
	if (isset($_POST['modif_couleur']))
	{
		if (nettoyerChaine($_POST['modif_couleur']) !== null and nettoyerChaine($_POST['modif_couleur']) !== "")
		{
			$modif_couleur = 1;
		}
	}
	$modif_quantite = 0;
	if (isset($_POST['modif_quantite']))
	{
		if (nettoyerChaine($_POST['modif_quantite']) !== null and nettoyerChaine($_POST['modif_quantite']) !== "")
		{
			$modif_quantite = 1;
		}
	}
	$modif_prix = 0;
	if (isset($_POST['modif_prix']))
	{
		if (nettoyerChaine($_POST['modif_prix']) !== null and nettoyerChaine($_POST['modif_prix']) !== "")
		{
			$modif_prix = 1;
		}
	}
	if (isset($_POST['submit_all']))
	{
		foreach ($produit_liste_unserialize as $key => &$value)
		{
			if (isset($value['article_nom']))
			{
				if ($value['article_nom'] === nettoyerChaine($_POST['article_nom']))
				{
					if(isset($_POST['article_categorie']))
					{
						$value['article_categorie'] = nettoyerChaine($_POST['article_categorie']);
					}
					if(isset($_POST['article_image']))
					{
						$value['article_image'] = nettoyerChaine($_POST['article_image']);
					}
					if(isset($_POST['article_couleur']))
					{
						$value['article_couleur'] = nettoyerChaine($_POST['article_couleur']);
					}
					if(isset($_POST['article_quantite_dispo']))
					{
						$value['article_quantite_dispo'] = nettoyerChaine($_POST['article_quantite_dispo']);
					}
					if(isset($_POST['article_prix']))
					{
						$value['article_prix'] = nettoyerChaine($_POST['article_prix']);
					}
					$produit_liste = serialize($produit_liste_unserialize);
					file_put_contents("../../produits/produits_liste", $produit_liste);
					$modification = 1;
					break;
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
			ARTICLES - MODIFICATION
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
		<div style="text-align:center">
			<form method="POST" action="modifier_article.php">
				<div>
					INFORMATION : Ne mettez pas d'espaces
					<br />
					Nom de l'article à modifier : <input type="text" name="article_nom" value="<?php if($exist === 1) echo $produit_choisi['article_nom'];?>" />
					<?php
					if ($exist === 1)
					{
						?>
						</br>
							<input type="checkbox" name="modif_categorie"> Changer la categorie de l'article
						<?php
						if ($modif_categorie === 1)
						{
							?>
							</br>
							Categorie de l'article à modifier : <input type="text" name="article_categorie" value="<?php if($modif_categorie === 1) echo $produit_choisi['article_categorie'];?>" />
							<?php
						}
						?>
						</br>
							<input type="checkbox" name="modif_image"> Changer l'url de l'image de l'article
						<?php
						if ($modif_image === 1)
						{
							?>
							</br>
							Url de l'image de l'article à modifier : <input type="text" name="article_image" value="<?php if($modif_image === 1) echo $produit_choisi['article_image'];?>" />
							<?php
						}
						?>
						</br>
							<input type="checkbox" name="modif_couleur"> Changer la couleur de l'article
						<?php
						if ($modif_couleur === 1)
						{
							?>
							</br>
							Couleur de l'article à modifier : <input type="text" name="article_couleur" value="<?php if($modif_couleur === 1) echo $produit_choisi['article_couleur'];?>" />
							<?php
						}
						?>
						</br>
							<input type="checkbox" name="modif_quantite"> Changer la quantite de l'article
						<?php
						if ($modif_quantite === 1)
						{
							?>
							</br>
							Quantite de l'article à modifier : <input type="number" min="0" name="article_quantite_dispo" value="<?php if($modif_quantite === 1) echo $produit_choisi['article_quantite_dispo'];?>" />
							<?php
						}
						?>
						</br>
							<input type="checkbox" name="modif_prix"> Changer le prix de l'article
						<?php
						if ($modif_prix === 1)
						{
							?>
							</br>
							Prix de l'article à modifier : <input type="number" min="0" name="article_prix" value="<?php if($modif_prix === 1) echo $produit_choisi['article_prix'];?>" />
							<?php
						}
					}
					?>
				</div>
				<input type="submit" name="submit" value="OK"/>
				<?php
					if($modif_categorie === 1 || $modif_quantite === 1 || $modif_couleur === 1 || $modif_image === 1 || $modif_prix === 1)
					{
						?>
						<br/>
						<input type="submit" name="submit_all" value="Save_change"/>
						<?php
					}
					if($modification === 1)
					{
						?>
						<div style="text-align:center">
							ARTICLE MIS A JOUR
						</div>
					<?php
					}

				?>

			</form>
		</div>
	</body>
</html>
