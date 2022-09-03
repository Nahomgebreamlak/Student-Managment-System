<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
else{

 $_SESSION['role']=$_SESSION['role']; 
}
?>
