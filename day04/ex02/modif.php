<?PHP
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === OK)
{
	if (file_exists("../private") === TRUE)
	{
		if (file_exists("../private/passwd") === TRUE)
		{
			if ($usr = unserialize(file_get_contents("../private/passwd")))
			{
				foreach($usr as $key=>$val)
				{
 					if (($val['login'] === $_POST['login']) && ($val['passwd'] === hash('whirlpool', $_POST['oldpw'])))
					{
						$usr[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
						file_put_contents("../private/passwd", serialize($usr));
						echo "OK\n";
						return ;
					}
				}
				echo "ERROR\n";
			}
			else
				echo "ERROR\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>