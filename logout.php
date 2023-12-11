<?php
session_start();
if(isset($_SESSION['loggedinuserid']))
{
    unset($_SESSION['loggedinuserid']);
}
header("Location: login.php");
?>
