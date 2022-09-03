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

<?php
include("../include/header.php");
?>
<?php
include("../include/sidenav.php");
?>
<?php
//include("../include/navigation.php");
include("../include/footer.php");
?>