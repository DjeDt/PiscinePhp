#!/usr/bin/php
<?PHP

if ($argc > 1)
{
	$arr = file_get_contents($argv[1]);
	var_dump($arr);
	$pattern = '/(?s)(?<=[">])(.+?)(?=["<])/';
	//$result = preg_replace_callback($pattern, strtoupper, $arr);
	$arr = preg_replace('/(?s)(?<=[">])(.+?)(?=["<])/', 'strtoupper("$0")', $arr);

	var_dump($arr);
	//	var_dump($arr);
}
?>
