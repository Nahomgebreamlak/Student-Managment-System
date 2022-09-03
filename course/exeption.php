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

<script src="../css/jquery-3.4.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $("#authors").change(function(){
        var aid = $("#authors").val();
        $.ajax({
          url: '../include/data.php',
          method: 'post',
          data: 'aid=' + aid
        }).done(function(books){
          console.log(books);
          books = JSON.parse(books);
          $('#books').empty();
           $('#course').empty();
         
          $('#books').append('<option selected>select Department</option>');
          
          books.forEach(function(book){
            $('#books').append('<option value="'+book.departmentname +'">' + book.departmentname + '</option>')
          })
        })
      })
    })
  </script>
































<?php

require_once("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");

//include("../include/navigation.php");
include("../include/footer.php");
?>


<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">
<form action="exeption.php" method="post"> 

<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round"  /> </input>
</div>


<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>


<div style="margin-left:20%">
<div class="w3-panel">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Exemption Managment system</b></h1>
</div>

<?php





if(isset($_POST['search'])){

$search=$_POST['searchinput'];


$_SESSION['sid']=$search;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmanagment";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = 'SELECT sid,scurrentsemester,scurrentyear,Faculty,Department,Typeofenrollment FROM student where sid like "'. $search. '" or fname like "'.$search .'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "sid: " . $row["sid"]. "<br>";
$_SESSION['csid']= $row["sid"];
$_SESSION['cscurrentsemester']= $row["scurrentsemester"];
$_SESSION['cFaculty']= $row["Faculty"];
$_SESSION['cscurrentyear']= $row["scurrentyear"];
$_SESSION['cDepartment']= $row["Department"];
$_SESSION['Typeofenrollment']= $row["Typeofenrollment"];

$csid=$row["sid"];
$cscs=$row["scurrentsemester"];
$cf=$row["Faculty"];
$ccy=$row["scurrentyear"];
$cdep=$row["Department"];
$type= $row["Typeofenrollment"];

 }
} else {
    echo "No student";
}



if(isset($_SESSION['csid']))
{
$cf=isset($cf)?$cf:"";
$cdep=isset($cdep)?$cdep:"";


$sqlcourse="select * from course where Faculty='".trim($cf)."' and Department='".trim($cdep)."' and admission='".$_SESSION['Typeofenrollment']."'";

//echo $sqlcourse;

//$sqlc='select * from course where faculty="Informatics " and Department="computer science" and semester="First " and tyear="1"';

$result = $conn->query($sqlcourse);

if ($result->num_rows > 0) {
    // output data of each row
  $count=1;
echo '<form action="exeption.php" method="post">';

    while($row = $result->fetch_assoc()) {
   
echo "Course Name: " . $row["cname"]."&nbsp;&nbsp;&nbsp;&nbsp;"; 

//echo '<input type="checkbox" value="'.$row['cname'].'" checked class="w3-check" name="checkebox"'.$count .'">';
$cname="chkb".$count;
$cnamed="chkbd".$count;

$csemester="sem".$count;
$ctyear="year".$count;

$_SESSION[$csemester]=$row['semester'];
$_SESSION[$ctyear]=$row['tyear'];


echo '<input type="checkbox"  class="w3-check" value="'.$row["ccode"] .'" name="'.$cname.'"/>';
echo '<input  type="hidden" checked class="w3-check" value="'.$row["ccode"] .'" name="'.$cnamed.'"/>';

echo  "<br>";
$count ++;


    }

    $_SESSION['count']=$count;
echo '<input type="submit" class="w3-input" style="width:30%" value="Exempt Courses" name="register" />';
echo '</form>';

} else {
    echo "no course";
}



}

$conn->close();








}
?>



<?php


if(isset($_POST['register'])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentmanagment";
    

    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo $_POST['checkebox'];

for($j=1;$j<(int)$_SESSION['count'];$j++){
$ccode='chkb'.$j; 
$ccoded='chkbd'.$j; 

$rcsemester="sem".$j;
$rctyear="year".$j;
$test=isset($_POST[$ccode])? 1 :0;
$ccode= isset($_POST[$ccode])?$_POST[$ccode]:" ";
$ccoded=isset($_POST[$ccoded])?$_POST[$ccoded]:" ";
$year=date("Y");
if($test==1){

$Inserted="SELECT sid from grade where Coursecode='".$ccode."' and sid='".$_SESSION['csid']."'";


$result = $conn->query($Inserted);

if ($result->num_rows > 0) {
 echo "Already Exempted";

}else{


//$sql="Insert into  takencourses(sid, Coursecode,Semester,Cyear,ayear,faculityname,departmentname,exempted) values ('".$_SESSION['csid']."','".$ccode."','".$_SESSION[$rcsemester]."','".$_SESSION[$rctyear]."',$year,'".$_SESSION['cFaculty']."','".$_SESSION['cDepartment']."','EX')";

$grade='EX';
$Ngrade='0';
$sqlG="Insert into grade(sid,Agrade,Ngrade,courseid,Acyear,semester,classyear) values ('".$_SESSION['csid']."','".$grade."','".$Ngrade."','". $ccode."','".$year."','".$_SESSION[$rcsemester]."','".$_SESSION[$rctyear]."')";
//echo $sqlG;



if ($conn->query($sqlG) === TRUE) {

  echo "New record created successfully";

  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}























}
else{
//$sql="Insert into  dropedcourse(sid, Coursecode,Semester,Cyear,ayear,faculityname,departmentname) values ('".$_SESSION['csid']."','".$ccoded."','".$_SESSION['cscurrentsemester']."','".$_SESSION['cscurrentyear']."',$year,'".$_SESSION['cFaculty']."','".$_SESSION['cDepartment']."')";
}


}



}
?>





</div>