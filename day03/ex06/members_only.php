<?PHP
if ($_SERVER['PHP_AUTH_USER'] === 'zaz' && $_SERVER['PHP_AUTH_PW'] === 'jaimelespetitsponeys')
{
  echo "<html><body>\nBonjour Zaz<br />\n";
	$str = base64_encode(file_get_contents("/Users/ddinaut/Pictures/img/42.png"));
	echo "<img src='data:image/png;base64,$str'>\n";
	echo "</body></html>\n";
	return ;
}
else
{
  header("Content-Type: text/html");
  header("WWW-Authenticate: Basic realm=''Espace membres''");
	header("HTTP/1.0 401 Unauthorized");
}
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
