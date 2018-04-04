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
			$arr[$key] = trim($arr[$key], "\x01..\x20");
	}
	return ($arr);
}

if ($argc < 2)
	return ;

$count = 1;
$tmp = array_values(ft_split($argv[$count]));
while ($tmp[$count] != NULL)
{
	print("$tmp[$count] ");
	$count++;
}
print("$tmp[0]\n");
?>
