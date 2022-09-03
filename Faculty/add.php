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

<form action="add.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  method="post">
<h2 class="w3-center">Add Faculty </h2>
 

 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Faculty Name<b style="color:red">*</b> </div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="facultyname" type="text" placeholder="Faculty Name" required>
    </div>
</div>




<p class="w3-center">
<input type="submit" name="addf" class="w3-button w3-section w3-blue w3-ripple" value="Add Faculty"/>  
</p>
</form>
        
        
        
        
        <?php
        if(isset($_POST['addf'])){

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
$stmt = $conn->prepare("INSERT INTO faculty (facultyname) VALUES (?)");
$stmt->bind_param("s",$fname);
$fname = $_POST['facultyname'];











$sql = "SELECT * FROM Faculty where facultyname='".$fname."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo '<div class="w3-card-4 w3-pale-green w3-xlarge">';

echo "Faculty Already Inserted";

echo "</div>";

}else{

$stmt->execute();

echo '<div class="w3-card-4 w3-pale-green w3-large">';
echo "New Faculty created successfully";
echo "</div>";
}




 
 

$stmt->close();
$conn->close();
        }
?>
</div>