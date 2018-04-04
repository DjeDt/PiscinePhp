#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	unset($argv[0]);
	$str = implode(" ", $argv);
	$str = trim($str);
	while (1)
	{
		$str_tmp = str_replace("  ", " ", $str);
		if ($str_tmp == $str)
			break ;
		$str = $str_tmp;
	}
	$array = explode(" ", $str);
	sort($array);
	foreach($array as $value)
	{
		echo $value."\n";
	}
}
?>
