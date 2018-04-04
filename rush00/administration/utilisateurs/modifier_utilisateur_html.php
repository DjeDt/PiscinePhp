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
<link rel="stylesheet" type="text/css" href="../administration.css">
<body>
	<div style="text-align:center">
		BIENVENUE DANS L'INTERFACE D'ADMINISTRATION
		<br />
		ARTICLES - MODIFICATION
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
			NFORMATION : Ne mettez pas d'espaces
			<form method="POST" action="modifier_utilisateur.php">
				<label for="iden">Identifiant à modifier : </label>
				<input id="iden" type="text" name="login" value=""/>
				<br />
				<label for="newpw">Nouveau mot de passe : </label>
				<input id="newpw" type="password" name="newpw" value=""/>
				<br />
				<label for="newprivilege">Privilege : "admin" ou "normal_user" </label>
				<input id="newprivilege" type="text" name="newprivilege" value=""/>
				<br />
				<input type="submit" name="submit" value="OK"/>
			</form>
		</div>
	</body>
</html>
