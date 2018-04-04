<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="login.css">
<?PHP
require_once("../administration/check_chaine.php");

	if (!file_exists("./private/passwd"))
	{
		echo 'user can\'t be found, contact administrator';
		return ;
	}
	if (isset($_POST['login'])
		AND isset($_POST['oldpw'])
		AND isset($_POST['newpw'])
		AND isset($_POST['submit'])
		AND ($tab = file_get_contents("./private/passwd")))
	{
		$login_clean = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
		if ($_POST['login'] !== NULL
			AND $_POST['oldpw'] !== NULL
			AND $_POST['newpw'] !== NULL
			AND $_POST['login'] !== ""
			AND $_POST['oldpw'] !== ""
			AND $_POST['newpw'] !== "")
		{
			$check_pwd = check_pwd_hard(nettoyerChaine($_POST['newpw']));
			if ($check_pwd)
			{
				$found = 0;
				$tab_unserialize = unserialize($tab);
				$hash_oldpw = hash('whirlpool', nettoyerChaine($_POST['oldpw']));
				foreach ($tab_unserialize as &$val)
				{
					if(isset($val['login']) AND isset($val['passwd']))
					{
						if ($val['login'] === nettoyerChaine($login_clean) && $val['passwd'] === $hash_oldpw)
						{
							$val['passwd'] = hash('whirlpool', nettoyerChaine($_POST['newpw']));
							$tab = serialize($tab_unserialize);
							file_put_contents("./private/passwd", $tab);
							$found = 1;
							?>
							<div style="text-align:center">
								MOT DE PASSE CHANGE
								<form method="POST" action="../index.php">
									<input type="submit" value="Return" name="return" action="../index.php" />
								</form>
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
</html>
