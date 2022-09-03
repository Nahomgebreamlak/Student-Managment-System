<?php // session_start();?>
<div class="w3-sidebar w3-blue w3-bar-block" style="width:20%; font-size:  15px;" >
  <img src="../images/sandaero.png" class="w3-round" alt="SanDaro" style="width:50%;height:10%;"> 
  <h3 class="w3-bar-item">Adminpage</h3>
<a href="../admin/logout.php" class="w3-bar-item w3-button w3-white">Logout</a>

<a onclick="myAccFunc('demoAcc1')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Student<i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    <a href="../student/add.php" class="w3-bar-item w3-button">New  Student</a>
      <a href="../student/edit.php" class="w3-bar-item w3-button">Edit student</a>
     <a href="../student/addyear.php" class="w3-bar-item w3-button">Add Accadamic Year</a>
    <a href="../student/addsection.php" class="w3-bar-item w3-button">Add Section</a>
    <a href="../student/graduationdate.php" class="w3-bar-item w3-button">Add Graduation date</a>
    
    </div>


<a onclick="myAccFunc('demoAcc2')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Grade <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    
     <a href="../Grade/add.php" class="w3-bar-item w3-button">New Grade</a>
     <a href="../Grade/addgrade.php" class="w3-bar-item w3-button">Add NG</a>
     
      <a href="../Grade/edit.php" class="w3-bar-item w3-button">Grade Change</a>
      <a href="../Grade/gradechange.php" class="w3-bar-item w3-button">Class Grade Change </a>
   
    </div>




<a onclick="myAccFunc('demoAcc3')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Course <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc3" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    <a href="../course/add.php" class="w3-bar-item w3-button">New Course</a>
    <a href="../course/assign.php" class="w3-bar-item w3-button">Registor Slip</a>
    <a href="../course/edit.php" class="w3-bar-item w3-button">edit Course</a>
    <a href="../course/adddropedc.php" class="w3-bar-item w3-button">Add Droped Course</a>
      
    </div>



<a onclick="myAccFunc('demoAcc4')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Faculity <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc4" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    <a href="../Faculty/add.php" class="w3-bar-item w3-button">New Faculty</a>
      <a href="../Faculty/edit.php" class="w3-bar-item w3-button">Edit Faculty</a>
    </div>


<a onclick="myAccFunc('demoAcc5')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Department <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc5" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    <a href="../Department/add.php" class="w3-bar-item w3-button">New Department</a>
      <a href="../Department/edit.php" class="w3-bar-item w3-button">Edit Department</a>
    </div>



   <a href="../course/exeption.php" class="w3-bar-item w3-button w3-white">Exemption Managment</a>


<a onclick="myAccFunc('demoAcc7')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Generate Report <i class="fa fa-caret-down"></i>
    </a>

    <div id="demoAcc7" class="w3-bar-block w3-hide w3-padding-large w3-medium">

   <a href="../report/temporary.php" class="w3-bar-item w3-button ">Temporary</a>
  
   <a href="../report/studentcopy.php" class="w3-bar-item w3-button ">Student Copy</a>
  
   <a href="../report/mastershit.php" class="w3-bar-item w3-button ">Master Sheet</a>
  
 <a href="../report/Semesterreport.php" class="w3-bar-item w3-button ">Semester Grade Report</a>
 <a href="../report/studentreport.php" class="w3-bar-item w3-button ">Report</a>
 <a href="../report/attandance.php" class="w3-bar-item w3-button ">Mark List</a>
 <a href="../report/marklist.php" class="w3-bar-item w3-button ">Attandance</a>
 
  
</div>








  
<?php 
//echo $_SESSION['role'];

if($_SESSION['role']=='admin')
{
?>
<a href="../admin/backup.php" class="w3-bar-item w3-button w3-white">Backup DataBase</a>
<a href="../admin/createuser.php" class="w3-bar-item w3-button w3-white">Create User</a>
<a href="../admin/edituser.php" class="w3-bar-item w3-button w3-white">Edit User</a>

<a onclick="myAccFunc('demoAcc6')" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
Backload <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc6" class="w3-bar-block w3-hide w3-padding-large w3-medium">
    
     <a href="../admin/Accounting and FInance.php" class="w3-bar-item w3-button">Accounting and Finance Masters</a>
      <a href="../admin/Accounting.php" class="w3-bar-item w3-button">Accounting Degree</a>
      <a href="../admin/mba.php" class="w3-bar-item w3-button">MBA</a>
   <a href="../admin/backload.php" class="w3-bar-item w3-button">MIS</a>
   <a href="../admin/software.php" class="w3-bar-item w3-button">Software</a>
    </div>
</div>

<?php } ?>






<script>
// Accordion 
function myAccFunc(x) {
  var x = document.getElementById(x);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}



</script>
<script type="text/javascript">
  function Logout(){
<?php $_GET['loginname']='Logout';
  ?>
}

</script>