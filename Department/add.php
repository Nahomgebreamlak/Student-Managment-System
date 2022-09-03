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

<form action="add.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
<h2 class="w3-center">Add Department </h2>
 

 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Department Name<b style="color:red">*</b></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="departmentname" type="text" placeholder="Department name " required>
    </div>
</div>



<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Faculty<b style="color:red">*</b></div>
    <div class="w3-rest">
      <select class="w3-select w3-border w3-round-large" name="Faculty">
      <?php 

$mydb->setQuery("SELECT * FROM `faculty`");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
  echo '<option value='.$result->facultyname.' >'.$result->facultyname.' </option>';

}
?> 
  </select>

      </div>




</div>



<p class="w3-center">
<input type="submit" name="add" class="w3-button w3-section w3-blue w3-ripple" value="Add Department "/>  
</p>
</form>
       


<?php
        if(isset($_POST['add'])){

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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO department (departmentname,facultyname,snamedep) VALUES (?, ?,?)");
$stmt->bind_param("sss", $dname, $fname,$sdepnme);


$dname = $_POST['departmentname'];
$fname = $_POST['Faculty'];
$sdepnme= strtoupper(substr($dname,0,3)); 




$sql = "SELECT * FROM department where facultyname='".$fname."' and departmentname='".$dname."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo '<div class="w3-card-4 w3-pale-green w3-xlarge">';

echo "Department Already Inserted";

echo "</div>";

}else{

$stmt->execute();

echo '<div class="w3-card-4 w3-pale-green w3-large">';
echo "New Department created successfully";
echo "</div>";
}







//$stmt->execute();


















$stmt->close();
$conn->close();
        }
?>


</div>

