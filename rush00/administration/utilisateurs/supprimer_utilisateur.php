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

	if (isset($_POST['login']))
	{
		if (!file_exists("../../login/private/passwd"))
		{
			echo 'user can\'t be found, contact administrator';
			return ;
		}
		$account_unserialize = unserialize(file_get_contents('../../login/private/passwd'));
		$exist = 0;
		if ($account_unserialize)
		{
			foreach ($account_unserialize as $key => &$value)
			{
				if (isset($value['login']))
				{
					if ($value['login'] === nettoyerChaine($_POST['login']))
					{
						$exist = 1;
						$value = "";
						$account = serialize(array_filter($account_unserialize));
						file_put_contents("../../login/private/passwd", $account);
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
			UTILISATEUR - SUPPRESSION
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
				SUPPRESSION REUSSIE
			</div>
			<?php
			}
			else
			{
				?>
				<div style="text-align:center">
					ERROR
				</div>
				<?php
			}
		}

		?>

	</body>
</html>
