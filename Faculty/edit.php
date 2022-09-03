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

<div class="w3-panel">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Edit Faculty</b></h1>
</div>




<div class="w3-container">
 
  <table class="w3-table-all w3-card-4">
    <tr>
    <th>F-ID</th>
        <th>Faculty Name</th>
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


$sql = "SELECT * FROM `Faculty`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
    while($row = $result->fetch_assoc()) { 

      $var=urlencode($row['facultyname']);
echo '<form method="post"  action =edit.php?hid='.$var.'>';

echo '<tr>';
echo "<td>" .$i. "</td>";
echo "<td><input type='text' class='w3-input' name='tfname' value='" .$row['facultyname']. "'</td>";
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
//$prirequest=isset($_POST['tpri'])?$_POST['tpri']:"";


$var2=urldecode($_GET['hid']);
$sql= "update Faculty set facultyname ='".$_POST['tfname']."' where facultyname='".$var2."' " ;
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

$sql ="delete from faculty where facultyname='".$var2."'";
//echo $sql;

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