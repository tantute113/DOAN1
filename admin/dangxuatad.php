<?php 
session_start();
if(isset($_SESSION['user_admin']))
{
    unset($_SESSION['user_admin']);
    header("Location:../loginform.php");
}


?>