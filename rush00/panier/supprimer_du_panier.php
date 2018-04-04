<?PHP
	session_start();
	include_once("func_panier.php");
	include_once("../func_utils.php");
?>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
</head>

<body>
	<ul id="menu">
		<li class="bouton_gauche"><a href="../index.php">Accueil</a></li>
		<li class="bouton_gauche"><a href="../produits.php">Produits</a></li>
		<li class="bouton_gauche"><a href="../categories.php">Categories</a></li>
		<li class="bouton_droite"><a href="index.php">Panier</a></li>
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
    if (isset($_POST) && isset($_POST['erase']))
    {
        $arr = unserialize($_POST['erase']);
        $ret = remove_article($arr);
        if ($ret === FALSE)
            echo 'an error occured, try again';
        else
            echo 'Produit supprime du panier';
    }
    ?>
</body>
</html>
