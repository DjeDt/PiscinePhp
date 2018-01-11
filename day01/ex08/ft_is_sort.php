#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$count = 0;
	while ($tab[$count] != NULL)
	{
		if ($tab[$count + 1] != NULL)
		{
			if (strcmp($tab[$count], $tab[$count + 1]) > 0)
				return FALSE;
		}
		$count++;
	}
	return TRUE;
}
?>