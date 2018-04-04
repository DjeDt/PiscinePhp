#!/usr/bin/php
<?PHP
if ($argc === 4)
{
	$nbr1 = trim($argv[1], "\x00..\x20");
	$oper = trim($argv[2], "\x00..\x20");
	$nbr2 = trim($argv[3], "\x00..\x20");

	if (($nbr2 == 0 && ($oper == '%' || $oper == '/')) || strlen($oper) != 1)
	{
		print("Incorrect Parameters\n");
		return ;
	}
	if ($oper === '+')
	    $result = $nbr1 + $nbr2;
	else if ($oper === '*')
		$result = $nbr1 * $nbr2;
	else if ($oper === '-')
		$result = $nbr1 - $nbr2;
	else if ($oper === '/')
		$result = $nbr1 / $nbr2;
	else if ($oper === '%')
		$result = $nbr1 % $nbr2;
	else
	{
		print("Incorrect Parameters\n");
		return ;
	}
	print("$result\n");
}
else
	print("Incorrect Parameters\n");
?>
