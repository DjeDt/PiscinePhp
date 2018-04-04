<?php
	session_start();
	if (!isset($_SESSION) ||
		!isset($_SESSION['loggued_on_user']) ||
		!isset($_SESSION['privilege']) ||
		$_SESSION['privilege'] == null ||
		$_SESSION['privilege'] !== "admin")
		{
			header("Location:../../index.php");
		}
        include_once("../../panier/func_panier.php");
?>
<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../index.css">
	<link rel="stylesheet" type="text/css" href="../administration.css">
	<body>
		<div style="text-align:center">
			BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
			<br />
			PANIER - GESTION
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
		<div style="text-align:center">
		UTILISATEURS DEJA EXISTANTS
		<br />
		<?php
			if (!file_exists("../../login/private/passwd"))
			{
				echo 'user can\'t be found, contact administrator';
				return ;
			}
			$account = unserialize(file_get_contents('../../login/private/passwd'));
			if ($account)
			{
				foreach ($account as $key => $value)
				{
					echo $value['login'] . " ";
				}
			}
		?>
		<br />
		<br />
		INFORMATION : Ne mettez pas d'espaces
		</div>
		<table class="tableau_produits">
						<?php
            if (isset($_POST))
            {
                if (isset($_POST['login']) && $_POST['login'] !== "")
                {
                    $found = 0;
                    if (!file_exists('../../login/private/passwd'))
            			file_put_contents('../../private/passwd', null);
            		$account = unserialize(file_get_contents('../../login/private/passwd'));
            		if ($account)
            		{
            			foreach ($account as $value)
            			if (isset($value['login']) && $_POST['login'])
            			{
            				if ($value['login'] === $_POST['login'])
            				{
                                $user_p = "../../panier/panier_client/".$value['login'];
                                if (!file_exists($user_p))
                                {
                                    echo 'Cet utilisateur n\'a pas de panier';
                                    return ;
                                }
                                $panier = unserialize(file_get_contents($user_p));
                                if ($panier)
                                {
                                    $found = 1;
									$total = 0;
                                    $nb_art = count($panier['article_nom']);
                                    echo '<tr class="tableau_produits_title">
                                        <td>Categorie</td>
                                        <td>Article</td>
                                        <td>Couleur</td>
                                        <td>Quantité disponible</td>
                                        <td>Prix</td>
                                        </tr>';
                                    for ($cc = 0 ;$cc < $nb_art ; $cc++)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.$panier["article_categorie"][$cc].'</td>';
                                        echo '<td>'.$panier["article_nom"][$cc].'</td>';
                                        echo '<td>'.$panier["article_couleur"][$cc].'</td>';
                                        echo '<td>'.$panier["article_quantite"][$cc].'</td>';
                                        echo '<td>'.$panier["article_prix"][$cc].'  Euros</td>';
                                        echo '</tr>';
										$total += $panier['article_quantite'][$cc] * $panier['article_prix'][$cc];
                                    }
                                    echo '<tr> <td colspan="6">
                                    Total : '.$total.'euros
                                    </td></tr>';
                                    }
                                }
                            }
                            if ($found !== 1)
                            {
                                echo 'Pas d\'utilisateurs avec ce nom trouvé';
                                return ;
                            }
            			}
            		}
                    else
                    {
                        echo '<div style="text-align:center">
                            <form method="POST" action="chercher_panier.php">
                                <label for="iden">Identifiant : </label>
                                <input id="iden" type="text" name="login" value=""/>
                                <br />
                                <input type="submit" name="submit" value="OK"/>
                            </form>
                        </div>';
                    }
                }
            ?>
		</table>
	</body>
</html>
