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
	<link rel="stylesheet" type="text/css" href="../../login/login.css">
	<body>
		<div style="text-align:center">
			BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
			<br />
			UTILISATEUR - MODIFICATION
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
<?PHP
require_once '../check_chaine.php';

	if (!file_exists("../../login/private/passwd"))
	{
		echo 'user can\'t be found, contact administrator';
		return ;
	}
	if (isset($_POST['login'])
		AND isset($_POST['newpw'])
		AND isset($_POST['submit'])
		AND isset($_POST['newprivilege'])
		AND ($tab = file_get_contents("../../login/private/passwd")))
	{
		if ($_POST['login'] !== NULL
			AND $_POST['newpw'] !== NULL
			AND $_POST['newprivilege'] !== NULL
			AND $_POST['login'] !== ""
			AND $_POST['newprivilege'] !== ""
			AND $_POST['newpw'] !== "")
		{
			$found = 0;
			$tab_unserialize = unserialize($tab);
			foreach ($tab_unserialize as &$val)
			{
				if(isset($val['login']) AND isset($val['passwd']))
				{
					if ($val['login'] === nettoyerChaine($_POST['login']))
					{
						$val['passwd'] = hash('whirlpool', nettoyerChaine($_POST['newpw']));
						$val['privilege'] = nettoyerChaine($_POST['newprivilege']);
						$tab = serialize($tab_unserialize);
						file_put_contents("../../login/private/passwd", $tab);
						$found = 1;
						?>
						<div style="text-align:center">
							MOT DE PASSE & PRIVILEGE A JOUR
						</div>
						<?PHP
						return ;
					}
				}
			}
			if ($found != 1)
			{
				?>
				<div style="text-align:center">
					ERROR
				</div>
				<?PHP
			}
		}
		else
		{
			?>
			<div style="text-align:center">
				ERROR
			</div>
			<?PHP
		}
	}
	else
	{
		?>
		<div style="text-align:center">
			ERROR
		</div>
		<?PHP
	}
?>
</html>
