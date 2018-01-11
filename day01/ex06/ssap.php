#!/usr/bin/php
<?PHP
$count = 1;
$arr = array();
while ($argv[$count] != NULL)
{
	$tmp = explode(" ", $argv[$count]);
	$count2 = 0;
	while ($tmp[$count2] != NULL)
	{
		$arr[] = $tmp[$count2];
	  	$count2++;
	}
	$count++;
}
sort($arr);
$count = 0;
while ($arr[$count] != NULL)
{
	  print("$arr[$count]\n");
	  $count++;
}
?>