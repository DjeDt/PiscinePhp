<?PHP
if ($_POST["login"] && $_POST["passwd"] && $_POST["submit"] === "OK")
{
	$val = -1;
	$path = '../private';
	var_dump($path);
	if (file_exists($path) === FALSE)
	   mkdir ($path);
	if (file_exists("$path/passwd") === TRUE)
	{
		$cnt = file_get_contents("$path/passwd");
		if (($usr = unserialize($cnt)))
		{
			$val = 0;
			foreach($usr as $key=>$value)
			{
				if ($value['login'] === $_POST['login'])
				{
					echo "ERROR\n";
					return ;
				}
				$val = $key;
			}
		}
	}
	$val += 1;
	$usr[$val]['login'] = $_POST['login'];
	$usr[$val]['passwd'] = hash("whirlpool", $_POST['passwd']);
	file_put_contents("$path/passwd", serialize($usr));
	echo "OK\n";
}
else
{
	echo "ERROR\n";
	return ;
}
?>
