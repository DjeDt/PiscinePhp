<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<body>
<?php
require_once '../administration/check_chaine.php';

	if(isset($_POST['submit']))
	{
		if (isset($_POST['login'])
		&& isset($_POST['email'])
		&& isset($_POST['passwd']))
		{
			$login_clean = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
			if ($_POST['submit'] === "OK"
				AND $_POST['login'] !== NULL
				AND $_POST['email'] !== NULL
				AND $_POST['passwd'] !== NULL
				AND $_POST['login'] !== ""
				AND $_POST['email'] !== ""
				AND $_POST['passwd'] !== ""
				AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== FALSE
				AND strlen($_POST['login']) <= 10
				)
			{
				if (!file_exists('./private'))
				{
					mkdir("./private");
				}
				if (!file_exists('./private/passwd'))
				{
					file_put_contents('./private/passwd', null);
				}
				$account = unserialize(file_get_contents('./private/passwd'));
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
						$account[] = $tmp;
						file_put_contents('./private/passwd', serialize($account));
						?>
						<div style="text-align:center">
							ACCOUNT CREE
							<br/>
							Login : <?php print_r($tmp['login']); ?>
							<form method="POST" action="../index.php">
								<input type="submit" value="Return" name="return" action="../index.php" />
							</form>
						</div>
						<?PHP
					}
					else
					{
						?>
						<div style="text-align:center">
							ERROR
							<form method="POST" action="../index.php">
								<input type="submit" value="Return" name="return" action="../index.php" />
							</form>
						</div>
						<?PHP
					}
				}
				else
				{
					?>
					<div style="text-align:center">
						ERROR
						<form method="POST" action="../index.php">
							<input type="submit" value="Return" name="return" action="../index.php" />
						</form>
					</div>
					<?PHP
				}
			}
			else
			{
				?>
				<div style="text-align:center">
					ERROR
					<form method="POST" action="../index.php">
						<input type="submit" value="Return" name="return" action="../index.php" />
					</form>
				</div>
				<?PHP
			}
		}
		else
		{
			?>
			<div style="text-align:center">
				ERROR
				<form method="POST" action="../index.php">
					<input type="submit" value="Return" name="return" action="../index.php" />
				</form>
			</div>
			<?PHP
		}
	}
	else
	{
		?>
		<div style="text-align:center">
			ERROR
			<form method="POST" action="../index.php">
				<input type="submit" value="Return" name="return" action="../index.php" />
			</form>
		</div>
		<?PHP
	}
?>
	</body>
</html>
