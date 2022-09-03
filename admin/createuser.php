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

  

<form action="createuser.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
<h2 class="w3-center">Create User</h2>
 
<select class="w3-select w3-border w3-round-large" name="role"  required="true">
             <option value="admin">Admin</option> 
             <option value="staff">Registrar Staff</option>
          </select>
        
 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Registerer Name<b style="color:red">*</b></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="Registerer Name" required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">User Name<b style="color:red">*</b></div>
    <div class="w3-rest">
      <input required class="w3-input w3-border" name="username" type="text" placeholder="User Name" required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Password<b style="color:red">*</b></div>
    <div class="w3-rest">
      <input  required class="w3-input w3-border" name="password" type="text" placeholder="Password" required="">
    </div>
</div>




<p class="w3-center">
<input type="submit" name="add" class="w3-button w3-section w3-blue w3-ripple" value="Create User "/>  

</p>
</form>






<?php

if(isset($_POST['add'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Studentmanagment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM user where username='".$_POST['username']."' and password='".sha1($_POST['password'])."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // echo "id: " . $row["username"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 
  echo "<div class='w3-red w3-xlarge'>";
 
    echo "Alredy in Use";
   echo "</div>";
 
  }
} 
else {
    
  
  $sql = "INSERT INTO user (username, password, Rname,Role) VALUES ('".$_POST["username"]."', '".sha1($_POST["password"])."', '".$_POST["name"]."', '".$_POST["role"]."')";

if ($conn->query($sql) === TRUE) {

    echo "<div class='w3-pale-green w3-xlarge'>";
    echo "New User created successfully";
echo "</div>";


} else {
   echo "<div class='w3-red w3-xlarge'>";
   
    echo "Error: " . $sql . "<br>" . $conn->error;

echo "</div>";
}
  
  
}

$conn->close();
}
?>




</div>
