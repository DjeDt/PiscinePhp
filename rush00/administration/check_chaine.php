<?php
	function nettoyerChaine($string)
	{
		$str = trim($string);
		$str = preg_replace("/\s\s+/", "", $str);
		$str = preg_replace("/\s/", "", $str);
		return($str);
	}

	function check_pwd_hard($pwd)
	{
		$check = FALSE;
		if (preg_match('/^[a-zA-Z]\w{3,14}$/', $pwd))
		{
			$check = TRUE;
		}
		return ($check);
	}
?>
