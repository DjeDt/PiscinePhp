#!/usr/bin/php
<?PHP

$arr = file($argv[1]);
foreach ($arr as $data)
		echo $data;

?>