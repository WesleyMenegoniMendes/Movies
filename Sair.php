<?php
session_start();
$Logout = $_GET['logout'];
echo $Logout;

if ($Logout == 1)
{
unset($_SESSION['ID']);
unset($_SESSION['Email']);
unset($_SESSION['Nome']);
header("Location: /Library%20Movies/Inicio.php");
}

?>