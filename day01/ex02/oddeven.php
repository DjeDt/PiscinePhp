#!/usr/bin/php
<?PHP
function get_input()
{
	$handle = fopen("php://stdin", "r");
	if (!$handle)
	{
		print("Can't read stdin");
		return (NULL);
	}
	$input = fgets($handle);
	fclose($handle);
	return ($input);
}

while (true)
{
	print("Entrez un nombre: ");
	$input = get_input();
	if ($input === NULL || !$input)
		break;
	$input = trim($input, "\x00..\x20");
	if (is_numeric($input))
	{
		if (($input % 2) != 0)
			print ("Le chiffre $input est Impair\n");
		else
			print ("Le chiffre $input est Pair\n");
	 }
	 else
		print("'$input' n'est pas un chiffre\n");
}
print ("\n");
?>
