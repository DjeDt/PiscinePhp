<?PHP
function auth($login, $passwd)
{
	if (file_exists('../private') === TRUE)
	{
		if (file_exists('../private/passwd') === TRUE)
		{
			if ($usr = unserialize(file_get_contents('../private/passwd')))
			{
				foreach($usr as $value)
				{
					if ($value['login'] === $login && $value['passwd'] === hash('whirlpool', $passwd))
					   return (TRUE);
				}
			}
		}
	}
	return (FALSE);
}
?>