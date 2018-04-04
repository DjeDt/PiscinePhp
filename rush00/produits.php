<?PHP
  session_start();
  include_once("func_utils.php");
?>

<html>
  <head>
    <title>Produits</title>
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

<table class="tableau_produits">
    <tr class="tableau_produits_title">
        <td>Categorie</td>
        <td>Article</td>
        <td>Visuel</td>
        <td>Couleur</td>
        <td>Prix</td>
        <td>Quantité disponible</td>
    </tr>
    <?PHP
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
            echo '<form method="post" action="ajouter_au_panier.php">
                <form method="post" action="ajouter_au_panier.php">
                    <tr class=\"tableau_produits\>';
                        echo "<td>".$key['article_categorie']."</td>";
                        echo "<td>".$key['article_nom']."</td>";
                        echo "<td>" . "<img src=".$key['article_image']." class=\"test\"alt=\"Photo du produit\"/>"."</td>";
                        echo "<td>".$key['article_couleur']."</td>";
                        echo "<td>".$key['article_prix']." Euros</td>";
                        echo "<td>".$key['article_quantite_dispo']."</td>";
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
     else
        echo "<tr><td colspan=\"2\"> no product </td></tr>";
    ?>
</table>
  </body>
</html>
