#!/usr/bin/php
<?PHP
function ft_split($input)
{
	$arr = explode(" ", $input);
	foreach ($arr as $key => $value)
	{
		if ($value == '')
			unset($arr[$key]);
		else
			$arr[$key] = trim($arr[$key], " ");
	}
	$arr = array_filter($arr);
	return $arr;
}

if ($argc > 1)
{
	print(implode(" ", ft_split($argv[1]))."\n");
}
?>
