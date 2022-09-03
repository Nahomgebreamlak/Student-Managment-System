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
<form action="adddropedc.php" method="post"> 
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
  <b>Add Droped Course</b></h1>
</div>

<?php


if(isset($_POST['register'])){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentmanagment";
    

 $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo $_POST['checkebox'];

for($j=1;$j<(int)$_SESSION['count'];$j++){
$ccode='chkb'.$j; 
$ccoded='chkbd'.$j; 
$sem="sem".$j;
$years="year".$j;

$tyear=$_POST[$years];
$semester=$_POST[$sem];




$test=isset($_POST[$ccode])? 1 :0;

//Echo $test;

$ccode= isset($_POST[$ccode])?$_POST[$ccode]:" ";
$ccoded=isset($_POST[$ccoded])?$_POST[$ccoded]:" ";

$year=date("Y");
if($test==1){
$sqltest="select * from takencourses where sid='".$_SESSION['csid']."' and Coursecode='".$ccode."'";
//echo $sqltest;

$result = mysqli_query($conn, $sqltest);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
 $sql4="delete from takencourses where sid='".$_SESSION['csid']."' and Coursecode='".$ccode."'";


if (mysqli_query($conn, $sql4)) {
  //  echo "Record Deleted successfully from takencourses";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


    }
} else {
    echo "0 results";
}




$sql="Insert into takencourses(sid, Coursecode,Semester,Cyear,ayear,faculityname,departmentname) values ('".$_SESSION['csid']."','".$ccode."','".$semester."','".$tyear."',$year,'".$_SESSION['cFaculty']."','".$_SESSION['cDepartment']."')";

$sql2="Delete from dropedcourse where sid='".$_SESSION['csid']."' and Coursecode='".$ccode."'";
$sql3=" delete from grade where sid='".$_SESSION['csid']."' and (Agrade='F' or Agrade='I' or Agrade='NG') and courseid='".$ccode."'";

//echo $sql3;
}
else{

}




if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2)) {
    echo "Record Deleted successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


if (mysqli_query($conn, $sql3)) {
    echo "Record Deleted successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}










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


$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT sid,scurrentsemester,scurrentyear,Faculty,Department,Typeofenrollment FROM student where sid like "'. $search. '" or fname like "'.$search .'"';
//echo $sql;


$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "sid: " . $row["sid"]. "<br>";
$_SESSION['csid']= $row["sid"];
$_SESSION['cscurrentsemester']= $row["scurrentsemester"];
$_SESSION['cFaculty']= $row["Faculty"];
$_SESSION['cscurrentyear']= $row["scurrentyear"];
$_SESSION['cDepartment']= $row["Department"];
$_SESSION['Typeofenrollment']= $row["Typeofenrollment"];

 }
} else {
    echo "0 results";
}



if(isset($_SESSION['csid']))
{

$mysqli = new mysqli("localhost", "root", "", "studentmanagment");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$sql='select dropedcourse.Coursecode , course.ccode ,course.cname , course.semester ,course.tyear from dropedcourse INNER JOIN course  ON course.ccode= dropedcourse.Coursecode where sid="'.$_POST['searchvalue'].'";';

$sql.="select grade.courseid, course.ccode ,course.cname , course.semester ,course.tyear from grade   INNER JOIN course  ON course.ccode= grade.Courseid  where sid='".$_POST['searchvalue']."' and (Agrade='F' or Agrade='I' or Agrade='NG')";


/* execute multi query */
if ($mysqli->multi_query($sql)) {
    $count=1;
echo '<form action="adddropedc.php" method="post">';

    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_assoc()) {
                printf("%s\n", $row["ccode"]);
           
echo "Cname: " . $row["cname"]; 

//echo '<input type="checkbox" value="'.$row['cname'].'" checked class="w3-check" name="checkebox"'.$count .'">';
$cname="chkb".$count;
$cnamed="chkbd".$count;
$sem="sem".$count;
$year="year".$count;
echo '<input type="checkbox" checked  class="w3-check" value="'.$row["ccode"] .'" name="'.$cname.'"/>';
echo '<input  type="hidden" checked class="w3-check" value="'.$row["ccode"] .'" name="'.$cnamed.'"/>';
echo '<input  type="hidden" checked class="w3-check" value="'.$row["semester"] .'" name="'.$sem.'"/>';
echo '<input  type="hidden" checked class="w3-check" value="'.$row["tyear"] .'" name="'.$year.'"/>';





echo  "<br>";
$count ++;
            }
            $result->free();
        }

        /* print divider */
        if ($mysqli->more_results()) {
            printf("\n");
        }
    } while ($mysqli->next_result());

$_SESSION['count']=$count;
echo '<input type="submit" value="Register" name="register" />';
echo '</form>';

}
}}
/* close connection */
//$mysqli->close();

?>

</div>