#!/usr/bin/php
<?PHP
function get_month($month)
{
	if ($month === "janvier")
	   return 1;
	else if ($month === "fevrier")
		 return 2;
	else if ($month == "mars")
		 return 3;
	else if ($month == "avril")
		 return 4;
	else if ($month == "mai")
		 return 5;
	else if ($month == "juin")
		 return 6;
	else if ($month == "juillet")
		 return 7;
	else if ($month == "aout")
		 return 8;
	else if ($month == "septembre")
		 return 9;
	else if ($month == "octobre")
		 return 10;
	else if ($month == "novembre")
		 return 11;
	else if ($month == "decembre")
		 return 12;
	else
		return -1;
}

function	check_format($arr)
{

	/*
	 0 = jour
	 1 = nbr
	 2 = nbr mois
	 3 = annee
	 4 = heure
	 5 = minute
	 6 = secondes
	*/
	if ($arr[1] < 1 || $arr[2] < 12)
}

if ($argc == 2)
{
	$str = preg_replace('/\s+/', ' ', trim($argv[1]));
	$arr = explode(" ", $str);
	$str = explode(":", $arr[4]);
	unset($arr[4]);
	$arr = array_merge($arr, $str);
	if (count($arr) != 7)
	{
		print("Wrong Format\n");
		return ;
	}
	$arr[2] = get_month(strtolower($arr[2]));
	var_dump($arr);
	check_format($arr);
	date_default_timezone_set('Europe/Paris');
	$t = mktime($arr[4], $arr[5], $arr[6], $arr[2], $arr[1], $arr[3]);
	print($t."\n");
}
?>
