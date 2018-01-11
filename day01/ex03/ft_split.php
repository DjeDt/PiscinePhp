#!/usr/bin/php
<?PHP
function ft_split($input)
{
	$arr = explode(" ", $input);
	foreach ($arr as $key => $value)
	{
		if ($value == '')
			unset($arr[$key]);
	}
	sort($arr, SORT_FLAG_CASE | SORT_STRING);
	return $arr;
}
$r = ft_split("hello   WORLD AAA");
print_r($r);
?>