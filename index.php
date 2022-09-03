
<?php session_start();?>

<link rel="stylesheet" href="css/w3.css">

<div class="w3-container w3-center">


<div class="w3-blue w3-xxlarge" style="50px;"> Sundaero COLLEGE</div>







<div id="id01" >
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="images/sandaero.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="index.php" method="post">
        <div class="w3-section">
           <select class="w3-select w3-border w3-round-large" name="role"  required="true">
             <option value="admin">Admin</option> 
             <option value="staff">Registrar Staff</option>
          </select>
        

          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Login</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
      </div>

    </div>
  </div>



</div>






<div class="w3-bottom">
  <div class="w3-bar w3-blue w3-center">
    2011   &copy Cloud Computer Engineering
  </div>
</div>


<?php
$connection=mysql_connect('localhost','root','') or die("Error connecting to Database");
     
   $db_name=mysql_select_db('studentmanagment',$connection);
   if(!$db_name){
   echo "Connecting to database failed";
   }



if(isset($_POST['username']) && isset($_POST['password'])){
$pass=sha1($_POST['password']);

$sql = "SELECT * FROM user where username='" . $_POST['username'] . "'  and  password ='" .  $pass. "' and role='".$_POST['role']."'";

$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
$row=mysql_fetch_array($result);
$_SESSION['loginuser']=$row[1];
$role=$_POST['role'];
if($role=='admin'){
header("location:home/index.php");
$_SESSION['role']='admin';
$_POST['role']='admin';
}else{
header("location:home/index.php");
$_SESSION['role']='staff';
}

  } 
else
  { ?>
    <script type="text/javascript" language="javascript">
  alert("Please Enter Your Correct UserName and Password ");
 </script>
  <?php
  }
  mysql_close($connection);
  }

?>



