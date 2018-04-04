<html>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../index.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<body>
		<div class = "authentification_center">
			INFORMATION : Ne mettez pas d'espaces
			<form method="POST" action="modif.php">
				<label for="iden">Identifiant: </label>
				<input id="iden" type="text" name="login" value=""/>
				<br />
				<label for="oldpw">Ancien mot de passe: </label>
				<input id="oldpw" type="password" name="oldpw" value=""/>
				<br />
				<label for="newpw">Nouveau mot de passe: </label>
				<input id="newpw" type="password" name="newpw" value=""/>
				<br />
				(premier charactere : lettre, entre 4 et 15 characteres, uniquement : lettres nombres underscore)</label>
				<br />
				<input type="submit" name="submit" value="OK"/>
			</form>

			<form method="POST" action="../index.php">
				<input type="submit" value="Return" name="return" action="../index.php" />
			</form>
		</div>
	</body>
</html>
