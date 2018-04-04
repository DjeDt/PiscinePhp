<?PHP
    session_start();
    include_once("func_panier.php");
    include_once("../func_utils.php")
?>
<html>
    <head>
        <title>Panier</title>
  	     <meta charset="utf-8">
  	      <link rel="stylesheet" type="text/css" href="../index.css">
    </head>
    <body>
        <ul id="menu">
      	     <li class="bouton_gauche"><a href="../index.php">Accueil</a></li>
             <li class="bouton_gauche"><a href="../produits.php">Produits</a></li>
      	     <li class="bouton_gauche"><a href="../categories.php">Categories</a></li>
             <li class="bouton_droite"><a href="index.php">Panier</a></li>
             <li class="bouton_droite"><a href="../login/connexion_html.php">
     			<?PHP
                 if (is_connected() === TRUE)
                 {
                     echo '<a href="../login/logout.php">
                     Deconnexion';
                 }
                 else
                 {
                     echo '<a href="../login/connexion_html.php">
                     Connexion';
                 }
     			?>
     		 </a></li>
        </ul>
    <table class="tableau_produits">
        <?PHP
        if (isset($_SESSION) && isset($_SESSION['panier']) && check_panier($_SESSION['panier']) !== TRUE)
        {
            $nb_art = count($_SESSION['panier']['article_nom']);
            if ($nb_art < 1)
                echo "<tr><td>Votre panier est vide </ td></tr>";
            else
            {
                echo '<tr class="tableau_produits_title">
                    <td>Categorie</td>
                    <td>Article</td>
                    <td>Couleur</td>
                    <td>Quantité achetée</td>
                    <td>Prix</td>
                    </tr>';
                for ($cc = 0 ;$cc < $nb_art ; $cc++)
                {
                    echo '<form method="post" action="supprimer_du_panier.php">
                        <form method="post" action="supprimer_du_panier.php">
                        <tr class="tableau_produits">';
                            echo '<td>'.$_SESSION["panier"]["article_categorie"][$cc].'</td>';
                            echo '<td>'.$_SESSION["panier"]["article_nom"][$cc].'</td>';
                            echo '<td>'.$_SESSION["panier"]["article_couleur"][$cc].'</td>';
                            echo '<td>'.$_SESSION["panier"]["article_quantite"][$cc].'</td>';
                            echo '<td>'.$_SESSION["panier"]["article_prix"][$cc].'  Euros</td>';
                            echo '<td>';
                                $str = serialize($_SESSION['panier']['article_nom'][$cc]);
                                echo '<label for="submit"></label>
                                <input type="hidden" name="erase" value='.$str.'/>
                                <input type="submit" name="Supprimer" value="Supprimer">';
                            echo '</td>
                            </tr>
                            </form>
                            </form>';
                }
                echo '<tr> <td colspan="6">
                Total : '.count_total().'euros
                <form method="post" action="valider_le_panier.php">
                <input type="submit" name="commander" value="Commander"/>
                </form>
                </td></tr>';
                }
        }
        else
            echo "<tr><td>Votre panier est vide</td></tr>";
        ?>
    </br>
        <div>

        </div>
    </table>
    </body>
</html>
