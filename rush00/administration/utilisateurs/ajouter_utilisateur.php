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
			UTILISATEUR - AJOUT
		</div>
		<ul id="menu">
			<li class="bouton_gauche"><a href="../../index.php">Accueil</a></li>
			<li class="bouton_gauche"><a href="../index.php">Administration</a></li>
		</ul>
<?php
require_once '../check_chaine.php';

	$pattern1 = "/<>/";
	$pattern2 = "/\"/";
	if(isset($_POST['submit']))
	{
		if (isset($_POST['login'])
		&& isset($_POST['passwd'])
		&& isset($_POST['email'])
			)
		{
			$login_clean = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
			if ($_POST['submit'] === "OK"
				AND $_POST['login'] !== NULL
				AND $_POST['passwd'] !== NULL
				AND $_POST['email'] !== NULL
				AND $_POST['login'] !== ""
				AND $_POST['email'] !== ""
				AND $_POST['passwd'] !== ""
				AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== FALSE
				AND strlen($_POST['login']) <= 10
				)
			{
				if (!file_exists('../../login/private'))
				{
					mkdir("../../login/private");
				}
				if (!file_exists('../../login/private/passwd'))
				{
					file_put_contents('../../login/private/passwd', null);
				}
				$account = unserialize(file_get_contents('../../login/private/passwd'));
				$exist = 0;
				if ($account)
				{
					foreach ($account as $key => $value)
					{
						if (isset($value['login']))
						{
							if ($value['login'] === nettoyerChaine($login_clean))
								$exist = 1;
						}
					}
				}
				if ($exist === 0)
				{
					$check_pwd = check_pwd_hard(nettoyerChaine($_POST['passwd']));
					if ($check_pwd)
					{
						$tmp['login'] = nettoyerChaine($login_clean);
						$tmp['passwd'] = hash('whirlpool', nettoyerChaine($_POST['passwd']));
						$tmp['privilege'] = "normal_user";
						$tmp['email'] = $_POST['email'];
						if (isset($_POST['privilege_admin']))
							$tmp['privilege'] = "admin";
						$account[] = $tmp;
						file_put_contents('../../login/private/passwd', serialize($account));
						?>
						<div style="text-align:center">
							ACCOUNT CREE
						</div>
						<?PHP
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
	</body>
</html>
