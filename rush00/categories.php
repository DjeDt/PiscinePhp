<?php
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
		<li class="bouton_droite"><a href="login/connexion_html.php">
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
	</ul>

	<?PHP

        if (isset($_POST) && count($_POST) > 0 && !isset($_POST['return']))
        {
            echo "<table class=\"tableau_produits\">";
            echo "<tr class=\"tableau_produits_title\">";
            echo "<td>Categorie</td>";
            echo "<td>Article</td>";
            echo "<td>Visuel</td>";
            echo "<td>Couleur</td>";
            echo "<td>Prix</td>";
            echo "<td>Quantité disponible</td>";
            echo "</tr>";
			if (!file_exists("produits/produits_liste"))
			{
				echo 'product can\'t be found, contact administrator';
				return ;
			}
            $bdd = unserialize(file_get_contents('produits/produits_liste'));
            if ($bdd)
            {
                foreach ($bdd as $value => $key)
                {
                    foreach($_POST as $val)
                    {
                        if ($val == $key['article_categorie'])
                        {
                            echo '<form method="post" action="ajouter_au_panier.php">';
                            echo '<form method="post" action="ajouter_au_panier.php">';
                            echo "<tr class=\"tableau_produits\">";
                            echo "<td>".$key['article_categorie']."</ td>";
                            echo "<td>".$key['article_nom']."</ td>";
                            echo "<td>" . "<img src=" . $key['article_image'] . " class=\"test\"alt=\"Photo du produit\"/>" . "</ td>";
                            echo "<td>".$key['article_couleur']."</ td>";
                            echo "<td>".$key['article_prix']."</ td>";
                            echo "<td>".$key['article_quantite_dispo']."</ td>";
                            echo "<td>";
                                echo '<label for="number">quantite : </label>';
                                echo '<input type="number" name="number" min="1" id="number"<br> <br>';
                                echo '</br>';
                                $str = serialize($key);
								echo '<input type="hidden" name="submit" value='.$str.'/>';
                            echo "</td>";
                            echo "</tr>";
                            echo '</form>';
                            echo '</form>';
                        }
                    }
                }
            }
            echo "</table>";
        }
        else
        {
            echo "<form method=\"post\" action=\"categories.php\">";
            echo "Quelles categories vous voulez voir ? </br>";
			if (!file_exists("produits/produits_liste"))
			{
				echo 'product can\'t be found, contact administrator';
				return ;
			}
            $bdd = unserialize(file_get_contents('produits/produits_liste'));
            if ($bdd)
            {
                $tmp = array();
                foreach ($bdd as $value => $key)
                {
                    if (array_search($key['article_categorie'], $tmp) === FALSE)
                    {
                        $test = $key['article_categorie'];
                        echo "<input type=\"checkbox\" name=".$test." value=".$test." id=".$test;
                        echo "label for=".$test."> ".$test." </label> <br>";
                        $tmp[] = $test;
                    }
                }
            }
            echo "<input type=\"submit\" value=\"Chercher\"></br>";
        }
        ?>
    <form method="POST" action="./categories.php">
    <input type="submit" value="Retour" name="return" action="./categories.php" />
    </form>
</body>
</html>
