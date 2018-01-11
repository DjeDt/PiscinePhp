#!/usr/bin/php
<?PHP
function ft_split($input)
{
	$arr = explode(" ", $input);
	foreach ($arr as $key => $value)
    {
		if ($value === '')
        unset($arr[$key]);
    }
    return $arr;
}
if ($argc == 2)
   echo implode(" " , ft_split($argv[1]))."\n";
?>