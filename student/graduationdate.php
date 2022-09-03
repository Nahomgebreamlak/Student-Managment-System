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

<form action="graduationdate.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"  method="post">
<h2 class="w3-center">Add Graduation Date </h2>
 

 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Graduation Date<b style="color:red">*</b> </div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="facultyname" type="date" placeholder="Graduation Date" required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Admission Year<b style="color:red">*</b> </div>
    <div class="w3-rest">
    <select  class="w3-select w3-border w3-round-large " name="year" >
        <?php 

          $mydb->setQuery("SELECT * FROM `year`");
          $cur = $mydb->loadResultList();

          foreach ($cur as $result) {
            echo '<option value='.$result->year.'>'.$result->year.'</option>';

          }
        ?> 
      </select>     </div>
</div>



<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Admission<b style="color:red">*</b> </div>
    <div class="w3-rest">
    <select  class="w3-select w3-border w3-round-large " name="typeofadmisson">
        <option value="RE"  >Regular</option>
  <option value="EX" >Extension</option>
 <option value="WE" >Week end</option>
 <option value="DIS" >Distance</option>

      </select>     </div>
</div>




<p class="w3-center">
<input type="submit" name="addf" class="w3-button w3-section w3-blue w3-ripple" value="Add Date"/>  
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
$stmt = $conn->prepare("INSERT INTO graduation (date,admission,year) VALUES (?,?,?)");
$stmt->bind_param("sss",$fname,$year,$admission);

$fname = $_POST['facultyname'];
$year=$_POST['typeofadmisson'];
$admission=$_POST['year'];












$sql = "SELECT * FROM graduation where date='".$fname."' and admission='".$admission."' and year='".$year."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo '<div class="w3-card-4 w3-pale-green w3-xlarge">';

echo "Date  Already Inserted";

echo "</div>";

}else{

$stmt->execute();

echo '<div class="w3-card-4 w3-pale-green w3-large">';
echo "New Graduation date created successfully";
echo "</div>";
}




 
 

$stmt->close();
$conn->close();
        }
?>
</div>