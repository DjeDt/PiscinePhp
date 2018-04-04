#!/usr/bin/php
<?PHP
function do_ope($nbr1, $oper, $nbr2)
{
	if ($nbr2 == 0 && ($oper == '/' || $oper == '%'))
	{
		print("Syntax Error\n");
		return ;
	}
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
	else
	{
		print("Syntax Error\n");
		return ;
	}
	print("$result\n");
}

if ($argc === 2)
{
	if (preg_match('/^ *(-?[\d]+) *([+\-\*\/\%]) *(-?[\d]+) *?/', $argv[1], $result))
		do_ope($result[1], $result[2], $result[3]);
	else
		print("Syntax Error\n");
}
else
	print("Incorrect Parameters\n");
?>
