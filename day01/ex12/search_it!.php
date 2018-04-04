#!/usr/bin/php
<?PHP
if ($argc < 3)
  return ;

$tmp = array();
$count = 2;
while ($argv[$count] != NULL)
{
  $arr = explode(":", $argv[$count]);
  if ($argv[1] === $arr[0])
    $tmp[] = $arr[1];
  $count++;
}
$ret = end($tmp);
if ($ret)
  print("$ret\n");
?>
