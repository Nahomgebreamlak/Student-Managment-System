<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
?>


<?php


require_once("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");

//include("../include/navigation.php");
include("../include/footer.php");
?>
<div style="margin-left:25%">






<div class="w3-container">
 
  <table class="w3-table-all w3-card-4">
    <tr>
    <th>D-ID</th>
      <th>Registeror  Name</th>
    <th>User Name</th>
    <th>Password</th>
        <th>Action</th>
     </tr>
   <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmanagment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$test=$_POST['searchinput'];

if(!isset($_POST['searchinput'])|| trim($_POST['searchinput'])=='')
{
$sccode=" ";

}else{

$sccode=" and  ccode='". $_POST['searchinput']."'";


}


$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
    while($row = $result->fetch_assoc()) { 

      $var=urlencode($row['Rname']);

echo '<form method="post"  action =edituser.php?hid='.$var.'>';

echo '<tr>';
echo "<td>" .$i. "</td>";
echo "<td> <input type='text' class='w3-input' name='tdname' value='" .$row['Rname']. "'</td>";
echo "<td><input type='text' class='w3-input' name='tfname' value='" .$row['Username']. "'</td>";

echo "<td><input type='text' class='w3-input' name='tsname' value='" .$row['Password']. "'</td>";
echo '<td>'      ;
echo "<div class='w3-container w3-cell'>";
echo "<input type='submit' value='Update' class='w3-input w3-green' name='edit'/>";   
echo "</div>";
echo "<div class='w3-container w3-cell'>";
 echo "<input type='submit' value='Delete' class='w3-input w3-red' name='delete'/>";   
echo "</div>";
echo "</td>";
echo '</tr>';
echo "</form>";
$i++;

      }


} else {
    echo "0 results";
}



?>

 
  </table>


<?php

if(isset($_POST['edit'])){
  $var2=urldecode($_GET['hid']);

$prirequest=isset($_POST['tpri'])?$_POST['tpri']:"";
$sql= "update user set Rname='".$_POST['tdname']."' ,Username ='".$_POST['tfname']."' , Password='".$_POST['tsname']."' where Rname='".$var2."' " ;
//echo $sql;
if ($conn->query($sql) === TRUE) {


echo '<div class="w3-card-4 w3-pale-green">';
echo "Record Updateed successfully";
echo "</div>";
} else {
    echo "Error deleting record: " . $conn->error;
}


}
if(isset($_POST['delete'])){
  $var2=urldecode($_GET['hid']);

$sql ="delete from user where Rname='".$var2."'";


if ($conn->query($sql) === TRUE) {
echo '<div class="w3-card-4 w3-red">';

    echo "Record deleted successfully";
echo "</div>";

} else {
    echo "Error deleting record: " . $conn->error;
}


}

?>
</div>
</div>