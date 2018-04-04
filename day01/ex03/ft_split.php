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
	sort($arr, SORT_STRING);
	return $arr;
}
?>
