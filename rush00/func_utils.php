<?PHP
function    is_connected()
{
    if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
    {
        if ($_SESSION['loggued_on_user'] !== "" AND $_SESSION['loggued_on_user'] !== null)
            return TRUE;
    }
    return FALSE;

}
?>
