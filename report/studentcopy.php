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





<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">
<form action="studentcopy.php" method="post"> 
<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round" required /> </input>
</div>
<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/w3.css">
    <title>Student Copy</title>


<style type="text/css">
th ,td{

	font-size:80%;
	padding: 2px;
}	

</style>


</head>
<body style="font-size:75%">

  <div class="w3-panel" style="margin-left: 50%;">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Student Copy</b></h1>
</div>

<?php if(isset($_POST['search'])){ 



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

?>
<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>

<div style="margin-left:25%; font-size:70%;" id="printMe">








<div class="w3-cell-row" style="font-size:70%;">
  <div class="w3-container  w3-cell" style="float: left;">
<?php 

$sql2="Select fname,lname , gname ,sex,sid,Typeofenrollment,faculty,department,DBdate from Student where (sid='".$_POST['searchinput'] ."'  OR fname='".$_POST['searchinput']."') and  (remark IS NULL OR
remark ='')";
//echo $sql2;
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    	{

    	 $_SESSION['fac']=isset($row['faculty'])?$row['faculty']:"";
         $_SESSION['dep']=isset($row['department'])?$row['department']:"";
//echo "string" . $_SESSION['fac'];

      $x=isset($row['Typeofenrollment'])?$row['Typeofenrollment']:"";
$_SESSION['typeofenrollment']=$x;
      if($x=='RE'){

$_SESSION['ADMISSION']='Semester';
$type="REGULAR";

      }
else if($x=='WE') {
$_SESSION['ADMISSION']='Term';
$type="Extension";


}

else if($x=='DIS') {
$_SESSION['ADMISSION']='Term';
$type="Distance";


}

else {

$_SESSION['ADMISSION']='Term';
$type="Extension";

      }

   
    $department=isset($row['department'])?$row['department']:"";

$typex=isset($type)?$type:"";




?>


<div id='header'>

<DIV style="">

<div class="w3-cell-row">
  <div class="w3-container w3-cell">
    <img src="../images/sandaero.png" style="width:80px ; height:70px ; float: left;">
  </div>
  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="w3-container  w3-cell" style="width: 1500px; font-size: 10px;">
    <p>SunDaero COLLEGE <br/>   OFFICE OF THE REGISTRAR <br/> STUDENT FINAL RECORD</p>
  
  </div>
 <div class="w3-container  w3-cell" style="width: 1500px; font-size: 10px;" id='header2'>
  <p>DEPARTMENT : <?php echo $department; ?> <br/>ADMISSION CLASSIFICATION : <?php echo $typex;?> <br/> MEDIUM OF INSTRUCTION : ENGLISH</p>
 

</div>

  <div class="w3-container  w3-cell" style="float: right;">
<img src="../images/sandaero.png" style="width:70px ; height:70px; " >
  </div>


</div>

</DIV>












<?php


 echo '<p><b>Name :' .strtoupper($row['fname'])." ".strtoupper($row['lname']). "  " .strtoupper($row['gname']). '   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ID NUMBER :' .  $row['sid'] .' &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;SEX:'. $row['sex'].'&nbsp;&nbsp;&nbsp; Date Of Birth :&nbsp;&nbsp;&nbsp;________________________ E.C</b></p>';




    }



} else {
 echo "No Student is Available with this id";
}


 ?>

    
</div>
</div>
</div>


<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   
    <?php 
$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";
if($x=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="1";
$_POST['st']="<sup>st</sup>";
$_POST['csemester']=" 1<sup>st</sup> ";
}else{

$_POST['semester']="First";
$_POST['classyear']="1";
$_POST['st']="<sup>st</sup>";
$_POST['csemester']=" 1<sup>st</sup> ";

}

$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";



//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;



echo    $_POST['classyear'].$_POST['st'] ."  Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";
 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th >Code</th>';
     echo  '<th >Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 

    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";
echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   



if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}








$gradepoint=0;
$i=$i + 1;
    }
    echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;


//-------------------------------------------- First Semister Grade  $_POST['FGrade1']-------------------- 


$_POST['FGrade1']=$Grade;


//First semester total credithour
$_POST['Ftotalcredithour']=$totalcredithour;
//First Semester total point
$_POST['Ftotalpoint1']=$totalgrade;


} 
else {

  //  echo " <b>No Grade for 1<sup>st</sup> Year 1<sup>st</sup> ".$_SESSION['ADMISSION']. "</b> <br/>";

}
echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';

echo "Semester Average : <b>".round($Grade,2)."</b>"; 
echo "</div>";
?>


    


  
  </div>
  

  <div class="w3-container  w3-cell">
  

<?php 
$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";

if($x=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="1";
$_POST['csemester']=' 2<sup>nd</sup> ';
$_POST['st']="<sup>st</sup>";

}else{

$_POST['semester']="Second";
$_POST['classyear']="1";
$_POST['st']="<sup>st</sup>";

$_POST['csemester']=' 2<sup>nd</sup> ';
}



$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ."  Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 


  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}

$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;


//First semester total credithour
$_POST['Ftotalcredithour2']=$_POST['Ftotalcredithour'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint2']=$_POST['Ftotalpoint1'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint1'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);
//echo $Comulative;
$FG1=($Grade + $_POST['FGrade1'])/2;
//echo $FG1;
//-------------------------------------------- First Semister Grade  $_POST['SGrade1']-------------------- 
$_POST['SGrade1']= $FG1;

echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";



} else {
  //  echo "0 results";
}


?>









      </div>
</div>





<br/>







<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   
    
<?php 
$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";

if($x=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="2";
$_POST['csemester']='1<sup>st</sup>';
$_POST['st']="<sup>nd</sup>";

}else{

$_POST['semester']="summer";
$_POST['classyear']="1";
$_POST['csemester'] ='3<sup>rd</sup>';
$_POST['st']="<sup>st</sup>";
}








$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";

//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo    $_POST['classyear'].$_POST['st'] ."  Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th style="width:80px">Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 
    // output data of each row
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}
$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['FGrade2']-------------------- 

$Comulative= round(($Grade + $_POST['SGrade1'])/2,2);
//echo $Comulative;
$SG1=($Grade + $_POST['SGrade1'])/2;
$_POST['FGrade2']= $SG1;
//echo $SG1;


$_POST['Ftotalcredithour3']=$_POST['Ftotalcredithour2'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint3']=$_POST['Ftotalpoint2'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour2'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint2'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);
















echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
  //  echo "0 results";
}


?>

    

  </div>
  

  <div class="w3-container  w3-cell">
  
    
<?php 
$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";


if($x=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="2";
$_POST['csemester']='2 <sup>nd</sup>';
$_POST['st']="<sup>nd</sup>";
}else{

$_POST['semester']="First";
$_POST['classyear']="2";
$_POST['csemester']='1 <sup>st</sup>';
$_POST['st']="<sup>nd</sup>";
}





$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']." ".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th style="width:80px">Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}
$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['SGrade2']-------------------- 

$Comulative= round(($Grade + $_POST['FGrade2'])/2,2);
$SG2=($Grade + $_POST['FGrade2'])/2;
$_POST['SGrade2']= $SG2;


//First semester total credithour
$_POST['Ftotalcredithour4']=$totalcredithour;
//First Semester total point
$_POST['Ftotalpoint4']=$totalgrade;

$tcredit=$_POST['Ftotalcredithour3'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint3'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);













$_POST['Ftotalcredithour4']=$_POST['Ftotalcredithour3'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint4']=$_POST['Ftotalpoint3'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour3'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint3'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);











echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";


} else {
  //  echo "0 results";
}

?>

















      </div>
</div>



<br/> 






<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   


<?php 

$x=isset($_SESSION['ADMISSION'])?$_SESSION['ADMISSION']:"";


if($x=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="3";
$_POST['csemester']='1<sup>st</sup>';
$_POST['st']="<sup>rd</sup>";

}else{

$_POST['semester']="Second";
$_POST['classyear']="2";
$_POST['csemester']='2<sup>nd</sup>';
$_POST['st']="<sup>nd</sup>";
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 

  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}
$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['FGrade3']-------------------- 

$Comulative= round(($Grade + $_POST['SGrade2'])/2,2);
$SG3=($Grade + $_POST['SGrade2'])/2;
$_POST['FGrade3']= $SG3;






$_POST['Ftotalcredithour5']=$_POST['Ftotalcredithour4'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint5']=$_POST['Ftotalpoint4'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour4'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint4'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);
















echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
 //   echo "0 results";
}


?>


  


  </div>
  

  <div class="w3-container  w3-cell">
  
<?php 
if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="3";
$_POST['csemester']='2 <sup>nd</sup>';
$_POST['st']="<sup>rd</sup>";

}else{

$_POST['semester']="summer";
$_POST['classyear']="2";
$_POST['csemester']='3 <sup>rd</sup>';
$_POST['st']="<sup>nd</sup>";
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}





$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['SGrade3']-------------------- 

$Comulative= round(($Grade + $_POST['FGrade3'])/2,2);


$sgh=($Grade + $_POST['FGrade3'])/2;
$_POST['SGrade3']= $sgh;














$_POST['Ftotalcredithour6']=$_POST['Ftotalcredithour5'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint6']=$_POST['Ftotalpoint5'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour5'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint5'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);






echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
//    echo "0 results";
}


?>








      </div>
</div>











<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   


<?php 

if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="4";
$_POST['csemester']='1 <sup>st</sup>';
$_POST['st']="<sup>th</sup>";

}else{

$_POST['semester']="First";
$_POST['classyear']="3";
$_POST['csemester']='1 <sup>st</sup>';
$_POST['st']="<sup>rd</sup>";
}


$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";

//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 


  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}








$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['FGrade3']-------------------- 

$Comulative= round(($Grade + $_POST['SGrade3'])/2,2);

$fxc=($Grade + $_POST['SGrade3'])/2;

$_POST['FGrade3']= $fxc;




$_POST['Ftotalcredithour7']=$_POST['Ftotalcredithour6'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint7']=$_POST['Ftotalpoint6'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour6'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint6'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);






















echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
   // echo "0 results";
}


?>


    
  


  </div>
  

  <div class="w3-container  w3-cell">
  
<?php 
if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="4";
$_POST['st']="<sup>th</sup>";
$_POST['csemester']='2 <sup>nd</sup>';
}else{

$_POST['semester']="Second";
$_POST['classyear']="3";
$_POST['csemester']='2 <sup>nd</sup>';
$_POST['st']="<sup>rd</sup>";
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";
 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}

$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['SGrade3']-------------------- 

$Comulative= round(($Grade + $_POST['FGrade3'])/2,2);

$txc=($Grade + $_POST['FGrade3'])/2;

$_POST['SGrade3']= $txc;





$_POST['Ftotalcredithour8']=$_POST['Ftotalcredithour7'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint8']=$_POST['Ftotalpoint7'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour7'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint7'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);













echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
 //   echo "0 results";
}


?>



    





      </div>
</div>


<div id='space'> </div>

<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   


<?php 

if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="5";
$_POST['csemester']='1 <sup>st</sup>';
$_POST['st']="<sup>th</sup>";

}else{

$_POST['semester']="summer";
$_POST['classyear']="3";
$_POST['csemester']='3 <sup>rd</sup>';
$_POST['st']="<sup>rd</sup>";
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// second Page Header
echo '<script type="text/javascript">document.getElementById("space").innerHTML += document.getElementById("header").innerHTML 



 </script>';
    // "<br><br><br><br><br><br><br><br>"
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";
 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 

  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}

$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['FGrade35']-------------------- 

$Comulative= round(($Grade + $_POST['SGrade3'])/2,2);

$tfn=($Grade + $_POST['SGrade3'])/2;
$_POST['FGrade35']= $tfn;




$_POST['Ftotalcredithour9']=$_POST['Ftotalcredithour8'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint9']=$_POST['Ftotalpoint8'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour8'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint8'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);

















echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";
} else {
   // echo "0 results";
}


?>


    
 


  </div>
  

  <div class="w3-container  w3-cell">
  
<?php 

if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="5";
$_POST['csemester']='2 <sup>nd</sup> ';
$_POST['st']="<sup>th</sup>";

}else{

$_POST['semester']="First";
$_POST['classyear']="4";
$_POST['csemester']='1 <sup>st</sup>';
$_POST['st']="<sup>th</sup>";
}


$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}

$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['SGrade35']-------------------- 

$Comulative= round(($Grade + $_POST['FGrade35'])/2,2);
$xcv=($Grade + $_POST['FGrade35'])/2;
$_POST['SGrade35']= $xcv;









$_POST['Ftotalcredithour10']=$_POST['Ftotalcredithour9'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint10']=$_POST['Ftotalpoint9'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour9'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint9'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);











echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
  //  echo "0 results";
}


?>







      </div>
</div>

<div class="w3-cell-row w3-border" >
  <div class="w3-container  w3-cell">
   


<?php 

if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="First";
$_POST['classyear']="6";
$_POST['st']="<sup>th</sup>";
$_POST['csemester']='1 <sup>st</sup> ';
}else{

$_POST['semester']="Second";
$_POST['classyear']="4";
$_POST['st']="<sup>th</sup>";
$_POST['csemester']='2 <sup>nd</sup> ';
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 


  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}
$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['FGrade3r']-------------------- 

$Comulative= round(($Grade + $_POST['SGrade35'])/2,2);
$sdf=($Grade + $_POST['SGrade35'])/2;
$_POST['FGrade3r']= $sdf;




$_POST['Ftotalcredithour11']=$_POST['Ftotalcredithour10'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint11']=$_POST['Ftotalpoint10'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour10'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint10'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);













echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
  //  echo "0 results";
}


?>


    
 


  </div>
  

  <div class="w3-container  w3-cell">
  
<?php 
if($_SESSION['ADMISSION']=='Semester'){

$_POST['semester']="Second";
$_POST['classyear']="6";
$_POST['csemester']='2';
$_POST['st']="<sup>sth</sup>";
}else{

$_POST['semester']="summer";
$_POST['classyear']="4";
$_POST['st']="<sup>th</sup>";
$_POST['csemester']='3 <sup>rd</sup>';
}

$sql = "SELECT course.admission,course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid   where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' and course.admission='".$_SESSION['typeofenrollment']."' and course.Faculty='".$_SESSION['fac']."'  and course.Department='".$_SESSION['dep']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
echo    $_POST['classyear'].$_POST['st'] ." Year ". $_POST['csemester']."".$_SESSION['ADMISSION']. "<br/>";

 echo '<table class="w3-table-all" border="1">';
 echo    '<tr>';
     echo ' <TH></TH>';
     echo  '<th>Code</th>';
     echo  '<th>Course</th>';
    echo  ' <th>Grade</th>';
     echo  '<th >Cr.Hr</th>';
    
   echo  '<th>pts</th>';
   echo  '</tr>';
 
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
$i=1;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];

echo "<tr>";
echo "<td>" . $i. "</td>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";
echo "<td>" .  $gradepoint. "</td>";
echo "</tr>";   


if($row['Agrade']=='EX'){

}else{

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];

}
$gradepoint=0;
$i=$i + 1;
    }

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td>".$totalcredithour."</td>";
echo "<td>".$totalgrade."</td>";
echo "</tr>";

$Grade= $totalgrade/$totalcredithour;
$_POST['tgrade']=$totalgrade;
$_POST['tcredithour']= $totalcredithour;
$_POST['grade']= $Grade;
//-------------------------------------------- First Semister Grade $_POST['SGrade3t']-------------------- 


$Comulative= round(($Grade + $_POST['FGrade3r'])/2,2);
$co=($Grade + $_POST['FGrade3r'])/2;
$_POST['SGrade3t']= $co;


$_POST['Ftotalcredithour12']=$_POST['Ftotalcredithour11'] +$totalcredithour; 
//First Semester total point
$_POST['Ftotalpoint12']=$_POST['Ftotalpoint11'] +$totalgrade;

$tcredit=$_POST['Ftotalcredithour11'] +$totalcredithour; 
$tpoint=$_POST['Ftotalpoint11'] +$totalgrade;





$Comulative= round(($tpoint/$tcredit),2);
















echo "</table>";
echo ' <div class="w3-container  w3-cell-bottom">';
echo "Semester Average : <b>".round($Grade,2)."</b> &nbsp;&nbsp;&nbsp;"; 
echo "Comulative Average : <b>".$Comulative."</b>"; 
echo "</div>";

} else {
   // echo "0 results";
}


?>



    




      </div>
</div>






<div class="w3-cell-row" style="font-size:80%;">
  <div class="w3-container  w3-cell">
    <p class="w3-center">Grading System : A=Excellent ,B=Good ,C=Satisfactory, D=Unsatisfactory ,F=Fail ,I=incomplete ,W=withdrow ,E=Exempted </p>
  </div>
  
</div>

<div class="w3-cell-row" style="margin-top: -20PX;" >
  <div class="w3-container  w3-cell">
    <p class="w3-center" style="font-size:80%;">Points : A=4, B=3,C=2, D=1, F=0 THIS TRANSCRIPT IS OFFICIAL ONLY WHEN SIGNED BY THE REGISTRAR  </p>
  </div>
  
</div>



<div class="w3-cell-row" style="margin-top: -30px;" >
  <div class="w3-container w3-cell" style="float: left;">
    <p style="font-size:80%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo date("Y/M/d"); ?></u></b></p>
  <p style="font-size:80%;" style="margin-top: -200PX;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Date of issue</p>
  
  </div>
  <div class="w3-container  w3-cell" style="float: right;">
    <p style="font-size:80%;"><b>___________________________</b></p>
  <p style="font-size:80%;" > &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Registrar</p>
  </div>
</div>






</div>

</div>
<?php } ?>
    
</body>
</html>











<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


</script>






<script language="javascript">
    var gAutoPrint = true;

    function processPrint(){

    if (document.getElementById != null){
    var html = '<HTML>\n<HEAD>\n';
    if (document.getElementsByTagName != null){
    var headTags = document.getElementsByTagName("head");
    if (headTags.length > 0) html += headTags[0].innerHTML;
    }

    html += '\n</HE' + 'AD>\n<BODY>\n';
    var printReadyElem = document.getElementById("printMe");

    if (printReadyElem != null) html += printReadyElem.innerHTML;
    else{
    alert("Error, no contents.");
    return;
    }

    html += '\n</BO' + 'DY>\n</HT' + 'ML>';
    var printWin = window.open("","processPrint");
    printWin.document.open();
    printWin.document.write(html);
    printWin.document.close();

    if (gAutoPrint) printWin.print();
    } else alert("Browser not supported.");

    }
</script>

