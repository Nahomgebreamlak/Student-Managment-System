<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
?>

<?php
include("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");
//include("../include/navigation.php");
include("../include/footer.php");
?>


<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">
<form action="assign.php" method="post"> 
<div class="w3-container w3-cell">
<input type="text"  name="searchvalue" class="w3-input w3-border w3-round" required /> </input>
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
  <b>Registor Slip</b></h1>
</div>

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

$test=isset($_POST[$ccode])? 1 :0;
$ccode= isset($_POST[$ccode])?$_POST[$ccode]:" ";
$ccoded=isset($_POST[$ccoded])?$_POST[$ccoded]:" ";
$year=date("Y");
if($test==1){
$sql="Insert into  takencourses(sid, Coursecode,Semester,Cyear,ayear,faculityname,departmentname) values ('".$_SESSION['csid']."','".$ccode."','".$_SESSION['cscurrentsemester']."','".$_SESSION['cscurrentyear']."',$year,'".$_SESSION['cFaculty']."','".$_SESSION['cDepartment']."')";

}
else{
$sql="Insert into  dropedcourse(sid, Coursecode,Semester,Cyear,ayear,faculityname,departmentname) values ('".$_SESSION['csid']."','".$ccoded."','".$_SESSION['cscurrentsemester']."','".$_SESSION['cscurrentyear']."',$year,'".$_SESSION['cFaculty']."','".$_SESSION['cDepartment']."')";
}






if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

$sem=$_SESSION['cscurrentsemester'];
$TYPE=$_SESSION['Typeofenrollment'];
$classyear=$_SESSION['cscurrentyear'];

if($sem=="First"){
$sem="Second";    
}
else if($sem=="Second" & $TYPE=="RE"){
$sem="First";
$classyear =$classyear + 1 ;
}

else if($sem=="Second" & $TYPE=="Ex"){
$sem="Summer";
$classyear =$classyear + 1 ;
}

else if($sem=="Summer"){
$sem="First";
$classyear =$classyear + 1 ;

}




$sql = "UPDATE student SET scurrentsemester='".$sem."', scurrentyear=". $classyear . " WHERE sid='".$_SESSION['sid']."'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
  //echo "UPDATEed successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
?>

<?php

if(isset($_POST['search'])){

$search=$_POST['searchvalue'];


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



$sqlcourse="select * from course where Faculty='".trim($_SESSION['cFaculty'])."' and Department='".trim($_SESSION['cDepartment'])."' and semester='".trim($_SESSION['cscurrentsemester'])."' and tyear='".trim($_SESSION['cscurrentyear'])."' and admission='".$_SESSION['Typeofenrollment']."'";


//echo $sqlcourse;

//$sqlc='select * from course where faculty="Informatics " and Department="computer science" and semester="First " and tyear="1"';

$result = $conn->query($sqlcourse);

if ($result->num_rows > 0) {
    // output data of each row
  $count=1;
echo '<form action="assign.php" method="post">';

    while($row = $result->fetch_assoc()) {
   
echo "Cname: " . $row["cname"]; 

//echo '<input type="checkbox" value="'.$row['cname'].'" checked class="w3-check" name="checkebox"'.$count .'">';
$cname="chkb".$count;
$cnamed="chkbd".$count;
echo '<input type="checkbox" checked  class="w3-check" value="'.$row["ccode"] .'" name="'.$cname.'"/>';
echo '<input  type="hidden" checked class="w3-check" value="'.$row["ccode"] .'" name="'.$cnamed.'"/>';

echo  "<br>";
$count ++;


    }

    $_SESSION['count']=$count;
echo '<input type="submit" class="w3-input" style="width:30%" value="Register" name="register" />';
echo '</form>';

} else {
    echo "no course";
}



}

$conn->close();








}
?>

</div>