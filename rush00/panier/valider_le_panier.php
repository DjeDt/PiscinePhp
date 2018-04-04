<?PHP
    session_start();
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
		<li class="bouton_droite">
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

    <?php
    if (isset($_POST) && isset($_POST['commander']))
    {
        if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
        {
            if ($_SESSION['loggued_on_user'] == "")
            {
                echo "you have to create an account to order product";
                return ;
            }
        }
        else
        {
            echo "you have to create an account to order product";
            return ;
        }
        if (!file_exists("panier_client"))
            mkdir("panier_client");
        if (file_exists("panier_client"))
        {
            $file = 'panier_client/'.$_SESSION["loggued_on_user"];
            $ret = file_put_contents($file, serialize($_SESSION['panier']));
            if ($ret === FALSE)
                echo "error when creating panier, contact administrator";
            else
                echo 'Panier validé et commandé';
        }
        else
            echo "unknow error, contact administrator";
    }
    ?>
</body>
</html>
