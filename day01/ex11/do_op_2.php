#!/usr/bin/php
<?PHP

function	is_operator($c)
{
	if ($c == '+' || $c == '-' || $c == '/' || $c == '*' || $c == '%')
	   return 1;
	return 0;
}

function do_ope($nbr1, $nbr2, $oper)
{
	if ($oper == '+')
	    $result = $nbr1 + $nbr2;
	else if ($oper == '*')
		$result = $nbr1 * $nbr2;
	else if ($oper == '-')
		$result = $nbr1 - $nbr2;
	else if ($oper == '/')
		$result = $nbr1 / $nbr2;
	else if ($oper == '%')
		$result = $nbr1 % $nbr2;
	print("$result\n");
}

if ($argc == 2)
{
	$num1;
	$num2;
	$ope;

	$count = 0;
	$count2 = 0;
	$str = trim($argv[1]);

	if (is_numeric($str[$count]) == TRUE)
	{
		while (is_numeric($str[$count]) == TRUE)
			  $count++;
	}
	else
	{
		print("Syntax Error\n");
		return ;
	}
	$num1 = substr($str, $count2, $count);
	while ($str[$count] == ' ')
		  $count++;
  	$count2 = $count;
	if (is_operator($str[$count]) == 1)
	   $ope = $str[$count];
	else
		error();
	while (is_operator($str[$count]) == 1)
		  $count++;
	$count2 = $count;
	if (is_numeric($str[$count]) == TRUE)
	{
		while (is_numeric($str[$count]) == TRUE)
			  $count++;
	}
	else
	{
		print("Syntax Error\n");
		return ;
	}
	$num2 = substr($str, $count2, $count);
	do_ope($num1, $num2, $ope);
}
else
	print("Incorrect Parameters\n");
?>