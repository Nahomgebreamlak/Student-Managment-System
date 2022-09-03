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
      <th>Department Name</th>
    <th>Faculty</th>
    <th>Department Short Name</th>
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


$sql = "SELECT * FROM `Department`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
    while($row = $result->fetch_assoc()) { 

      $var=urlencode($row['departmentname']);

echo '<form method="post"  action =edit.php?hid='.$var.'>';

echo '<tr>';
echo "<td>" .$i. "</td>";
echo "<td> <input type='text' class='w3-input' name='tdname' value='" .$row['departmentname']. "'</td>";
echo "<td><input type='text' class='w3-input' name='tfname' value='" .$row['facultyname']. "'</td>";

echo "<td><input type='text' class='w3-input' name='tsname' value='" .$row['snamedep']. "'</td>";
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
$sql= "update Department set departmentname='".$_POST['tdname']."' ,facultyname ='".$_POST['tfname']."' , snamedep='".$_POST['tsname']."' where departmentname='".$var2."' " ;
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

$sql ="delete from Department where departmentname='".$var2."'";


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