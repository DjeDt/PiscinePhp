<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<body>
<?php
	include_once("auth.php");
	require_once("../administration/check_chaine.php");

	session_start();
	$_SESSION['loggued_on_user'] = '';
	if (isset($_POST['login'])
		&& isset($_POST['passwd'])
		&& auth($_POST['login'], nettoyerChaine($_POST['passwd'])))
	{
		$_SESSION['loggued_on_user'] = nettoyerChaine($_POST['login']);
		if (!file_exists("./private/passwd"))
		{
			echo 'user can\'t be found, contact administrator';
			return ;
		}
		$account = unserialize(file_get_contents('./private/passwd'));
		foreach ($account as $value)
		{
			if (isset($value['login']))
			{
				if ($value['login'] === $_SESSION['loggued_on_user'])
					$_SESSION['privilege'] = $value['privilege'];
			}
		}
		if ($_SESSION['privilege'] === "admin")
		{
			header('Location: ../administration/index.php');
		}
		else
		{
			header('Location: ../index.php');
		}
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		?>
		<div class="authentification_center">
			LOGIN INEXISTANT
			<form method="POST" action="../index.php">
				<input type="submit" value="Return" name="return" action="../index.php" />
			</form>
		</div>
		<?PHP
	}
?>
</body>
</html>
