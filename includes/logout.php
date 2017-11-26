<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Refresh:0; url=../login/index.php"); // Redirecting To Home Page
}
?>
