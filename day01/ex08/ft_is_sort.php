<?PHP
function ft_is_sort($tab)
{
	$sorted = $tab;
	sort($sorted);
	if (array_diff_assoc($sorted, $tab))
		return (FALSE);
	return (TRUE);
}
?>
