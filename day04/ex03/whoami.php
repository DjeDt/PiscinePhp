<?PHP
session_start();
if ($_SESSION['logged_on_user'])
{
	if ($_SESSION['logged_on_user'] !== "")
	{
	   echo $_SESSION['logged_on_user']."\n";
	   return ;
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>