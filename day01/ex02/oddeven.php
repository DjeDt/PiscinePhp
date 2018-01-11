#!/usr/bin/php
<?PHP
function get_input()
{
	print("Entrez un nombre : ");
	$handle = fopen("php://stdin", "r");
	$input = fgets($handle);
	fclose($handle);
	return ($input);
}

while (true)
{
	$input = get_input();
	if ($input == NULL)
	{
		print("^D");
		break;
	}
	$input = rtrim($input);
	if (is_numeric($input))
	{
		if ($input % 2 == 1)
		    print ("Le chiffre $input est Impair\n");
		else
			print ("Le chiffre $input est Pair\n");
	 }
	 else
		print("'$input' n'est pas un chiffre\n");
}
print ("\n");
?>