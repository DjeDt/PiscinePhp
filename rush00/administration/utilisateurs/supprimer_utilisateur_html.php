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
			UTILISATEUR - SUPPRESSION
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
			<form method="POST" action="supprimer_utilisateur.php">
				<div>
					INFORMATION : Ne mettez pas d'espaces
					<br />
					Nom de l'utilisateur à supprimer : <input type="text" name="login"/>
				</div>
				<input type="submit" name="submit" value="OK"/>
			</form>
		</div>
	</body>
</html>
