<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
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
         
          $('#books').append('<option selected>select course</option>');
          
          books.forEach(function(book){
            $('#books').append('<option value="'+book.departmentname +'">' + book.departmentname + '</option>')
          })
        })
      })
    })
  </script>




<script type="text/javascript">
    $(document).ready(function(){
      $("#books").change(function(){
        var aid = $("#books").val();
        $.ajax({
          url: '../include/data.php',
          method: 'post',
          data: 'dep=' + aid
        }).done(function(books){
          console.log(books);
          books = JSON.parse(books);
          $('#course').empty();
           $('#course').append('<option selected>select course</option>');
          
          books.forEach(function(book){
           
   $('#course').append('<option value="'+book.ccode +'">' + book.cname + '</option>')
         
          })
        })
      })
    })
  </script>








<?php
include("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");
//include("../include/navigation.php");
include("../include/footer.php");
?>







<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">
<form action="addgrade.php" method="post"> 



<div class="w3-container w3-cell">
<input type="text" placeholder="Course Code" name="searchinput1" class="w3-input w3-border w3-round" required /> </input>
</div>


<div class="w3-container w3-cell">
<input type="text"  name="searchinput" placeholder="Student Id"   class="w3-input w3-border w3-round" required /> </input>
</div>



<div class="w3-container w3-cell">

<select  required class="w3-select w3-border w3-round-large" name="typeofenrollment">
    <option value="RE">Regular</option>
  <option value="EX" >Extension</option>
 <option value="WE" >Week end</option>
 <option value="DIS">Distance</option>
 
   </select>
</div>



<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>























<?php
if(isset($_POST['add'])){
?>
<?php
}

?>

<div style="margin-left:20%">

<div class="w3-panel">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>New Grade</b></h1>
</div>

<?php
if(isset($_POST['search'])){
//echo $_POST['yearofstudy'];

  $_SESSION['coursecode']=$_POST['searchinput1'];
?>




<div class="w3-container">

  <h2> New Grade</h2>
  
  <table class="w3-table-all w3-card-4">
    <tr>
    <th>num</th>
    <th>SID</th>
      <th>Name</th>
      <th>Grade</th>
    </tr>

    <?php
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

//$sql = "SELECT sid, fname, lname FROM student ";
//$sql="select student.sid,student.fname, student.lname ,takencourses.coursecode from student INNER JOIN takencourses on takencourses.sid=student.sid where takencourses.coursecode='123'";



//!isset($_POST['var'])?null:$_POST['var']


//$year=$_POST['year'];
//$Faculty=$_POST['faculty'];
//$department=$_POST['department'];
//$faculty=$_POST['faculty'];

//$semester=$_POST['semester'];
//$yearofstudy =$_POST['yearofstudy'];
//$course=$_POST['course'];



if(!isset($_POST['searchinput'])|| trim($_POST['searchinput'])=='')
{
$sccode=" ";

}else{

$sccode=" and  student.sid='". $_POST['searchinput']."'";


}



$sql="select distinct student.sid,student.fname, student.lname ,course.cname ,course.semester,course.tyear from student Inner JOIN course on course.cname=course.cname where student.sid='".$_POST['searchinput']."' and course.cname='".$_POST['searchinput1']."' and course.admission='".$_POST['typeofenrollment']."'";
//echo $sql;

//$sql="select student.sid,student.fname, student.lname from student where sid='".$_POST['searchinput']."'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 $i=1;
 $_SESSION["count"]=1;
     
echo '<form action="addgrade.php" method="post">';

    while($row = $result->fetch_assoc()) {
echo '<tr>';    
$sid="sid" .$i;      


$_SESSION['coursecode']=$row['cname'];
$_SESSION['year']=$row['tyear'];
$_SESSION['Semester']=$row['semester'];
$_SESSION['yearofstudy']=$row['tyear'];




//echo $_POST['year'];

//echo $sid;
echo '<td style="width:5px;">'. $i .'</td>';
      echo '<td style="width:200px;"><input type="text" readonly class="w3-input" value="'.$row["sid"] .'" name="'.$sid.'"/></td>';
      
      echo "<td>";
       echo $row['fname'] ;
       echo " &nbsp;&nbsp;";
       echo $row["lname"] ;
       echo "</td>";
       echo '<td style="width:150px;">';
       $name="grade" .$i;

echo '<select class="w3-select w3-border w3-round-large" name="'.$name.'">';
  
  echo '<option value="A+">A+</option>';
  echo '<option value="A">A</option>';
  echo ' <option value="A-">A-</option>';
  echo ' <option value="B+">B+</option>';
  echo ' <option value="B">B</option>';
  echo ' <option value="B-">B-</option>';
  echo ' <option value="C+">C+</option>';
  echo ' <option value="C">C</option>';
  echo ' <option value="C-">C-</option>';
  echo ' <option value="D+">D+</option>';
  echo ' <option value="D">D</option>';
  echo ' <option value="D-">D-</option>';
  echo ' <option value="F">F</option>';
  echo ' <option value="NG">No Grade</option>';
  echo ' <option value="I">In complite</option>';
  echo '</select>';
echo '</td>' ;
echo '</tr>';
$i ++;
      }
      $_SESSION["count"]=$i;
      $i=1;
echo '<input type="submit" class="w3-button w3-section w3-blue w3-ripple" value="Insert Grade" name="add" />';

      echo '</form>';
} else {
    echo "No Student is available with this search";
}
$conn->close();
?>

    <tr class="w3-center">
    <td ><p class="w3-center">
</p>
    </td>
    </tr>
  </table>
<?php }?>



<?php

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



if(isset($_POST['add'])){
for($j=1;$j<(int)$_SESSION['count'];$j++){
 $psid='sid'.$j; 
$nsid=$_POST[$psid];
$grades='grade'.$j; 
$grade=$_POST[$grades];

//echo $grade;

if($grade==='A+'||$grade==='A'){
$Ngrade = 4;
}
else if($grade==='A-'){

$Ngrade = 3.75;
}


else if($grade=='B+'){
$Ngrade=3.5;
}


else if($grade=='B'){
$Ngrade=3;
}

else if($grade=='B-'){
$Ngrade=2.75;
}


else if($grade=='C+'){
  $Ngrade=2.5;
  }


else if($grade=='C'){
  $Ngrade=2;
  }
else if($grade=='C-'){
  $Ngrade=1.75;
  }
  else if($grade=='D+'||$grade=='D'||$grade=='D-'){
    $Ngrade=1;
    }
else {
$Ngrade = 0;
}

//echo $Ngrade;
$sql="Insert into grade(sid,Agrade,Ngrade,courseid,Acyear,semester,classyear) values ('".$nsid."','".$grade."','".$Ngrade."','". $_SESSION['coursecode']."','".$_SESSION['year']."','".$_SESSION['Semester']."','".$_SESSION['yearofstudy']."')";
//echo $sql;






//$sql="update grade set Agrade='".$grade."' , Ngrade='".$Ngrade."' where sid='".$nsid."' and courseid='".$_SESSION['coursecode']."'";


//echo $sql;



if ($conn->query($sql) === TRUE) {
  echo '<div class="w3-card-4 w3-xlarge w3-pale-green">';



  echo "Grade Inserted  successfully";
echo "</div>";

} else {
echo '<div class="w3-card-4 w3-red">';

  echo "Error: " . $sql . "<br>" . $conn->error;
echo "</div>";

}

}
?>
<script>
alert("Grade Succesfully Inserted");
</script>
<?php
$conn->close();
}

?>
</div> 
</div>