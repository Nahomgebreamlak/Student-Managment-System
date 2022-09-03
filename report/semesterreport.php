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
<form action="semesterreport.php" method="post"> 
<div class="w3-container w3-cell">
<select class="w3-select w3-border w3-round-large" name="semester" required>
    <option value="" disabled selected>Semester</option>
    <option value="First">First</option>
    <option value="Second">Second</option>
    <option value="Summer">Summer</option>
  </select></div>




<div class="w3-container w3-cell">
<select class="w3-select w3-border w3-round-large" name="classyear" required>
    <option value="" disabled selected>Class Year</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
 
  </select>
</div>

<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round" required /> </input>
</div>


<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


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

<div style="margin-left:25%" id="printMe">


<div class="w3-cell-row">
  <div class="w3-container  w3-cell w3-right">
  <p> <img src="../images/sandaero.png" style="width:140px ; height:125px" ></p>
  </div>
  <div class="w3-container  w3-cell">
  <p>SunDaero College</p>
  <p>OFFICE OF THE REGISTRAR </p>
  <p>Examination Grade Report </p>
  </div>
</div>








<div class="w3-cell-row">
  <?php 
$Faculty="";
$Department="";
$sql="select * from Student where sid='".$_POST['searchinput']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 
echo '<div class="w3-container  w3-cell">';
echo '<p>Student Name :' .$row["Fname"] .' '.$row['Lname'].'  ' .$row['gname'] .'</p>';
echo '<p>ID Number :'.$row['sid'] .'</p>';
echo '<p>Semester:'.$_POST['semester'].'</p>';
    $_POST['typeofenrollment']=$row['Typeofenrollment'];
echo '<p>Program : BA in '.$row['Department'].'('.$row['Typeofenrollment'].')</p> </div>';
  echo '<div class="w3-container  w3-cell">';
  echo '<p> Date :'.  date("Y/M/D") .'</p>';
  echo "<p>Department : ".$row['Department']."</p><p>Acadamic year :" . date("Y") ." G.C</p>";  
    echo "<p> class year: ".$_POST['classyear']."</p>";
  echo "</div>";

  $Faculty=isset($row['Faculty'])?$row['Faculty']:"";
  $Department=isset($row['Department'])?$row['Department']:"";
}

}
 else
  {
 }


?>
 </div>


<div class="w3-container">
  
  <table class="w3-table-all">
    <tr>
      <th>Course Code</th>
      <th>Course Title</th>
      <th >Grade</th>
    <th> Cr.Hr</th>
    <th>Gr.Pt</th>
    </tr>
    
<?php 
$x= isset($_POST['typeofenrollment'])?$_POST['typeofenrollment']:"RE";

$sql = "SELECT DISTINCT course.admission, course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade,course.Faculty,course.Department FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid  
where grade.sid='".$_POST['searchinput']."' and grade.semester='". $_POST['semester'] . "' and grade.classyear='".$_POST['classyear']."' 
and course.admission='".$x."' and course.Faculty='".$Faculty."'  and course.Department='".$Department."'";


//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
    while($row = $result->fetch_assoc()) {
echo "<tr>";

echo "<td>" .  $row['ccode']. "</td>";
echo "<td>" .  $row['cname']. "</td>";
echo "<td>" .  $row['Agrade']. "</td>";
echo "<td>" .  $row['credithours']. "</td>";

$gradepoint= $row['Ngrade'] * $row['credithours'];
echo "<td>" .  $gradepoint. "</td>";



echo "</tr>";   

$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour + $row['credithours'];
$gradepoint=0;

    }

echo "<tr>";
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

} else {


 echo '<div class="w3-card-4 w3-pale-green w3-large">';
 echo "No Grades For This Semester";
echo "</div>";
   


}


?>






    </table>
</div>


<?php 
$year=(int)$_POST['classyear'];

if($_POST['semester']=="First"){

$csemester=" and grade.semester='First'";
}
 if($_POST['semester']=="Second"){
$csemester=" and  (grade.semester='First' or grade.semester='Second' )";
}
if($_POST['semester']=="Summer"){

$csemester="   and  (grade.semester='First' or grade.semester='Second' or grade.semester='Second') ";
}



//echo $csemester;

$sql = "SELECT course.ccode,course.credithours,course.cname,grade.Agrade,grade.Ngrade,grade.classyear ,course.Faculty,course.Department FROM grade INNER JOIN course  ON course.cname= grade.Courseid or course.ccode= grade.Courseid    
where grade.sid='".$_POST['searchinput']."' and grade.classyear<=".(int)$_POST['classyear']." 
and course.admission='".$x."' and course.Faculty='".$Faculty."'  and course.Department='".$Department."' " . $csemester;




//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $totalgrade=0;
  $totalcredithour=0;
$gradepoint=0;
    while($row = $result->fetch_assoc()) {
$gradepoint= $row['Ngrade'] * $row['credithours'];
$totalgrade=  $totalgrade + $gradepoint;
$totalcredithour=$totalcredithour+ $row['credithours'];
$gradepoint=0;
    }

$Grade= $totalgrade/$totalcredithour;
$_POST['Ctgrade']=$totalgrade;
$_POST['Ctcredithour']= $totalcredithour;
$_POST['Cgrade']= $Grade;

} else {
    echo "No Grade Is Available";
}
$conn->close();

?>







<div class="w3-container">
  
  <table class="w3-table">
    <tr>
      <th></th>
      <th>Credit Hrs</th>
      <th >Gr.Points</th>
    <th> Gr. Point Average</th>
    </tr>
   
   
    <tr>
      <td>Semester Total</td>
      <td><?php echo isset($_POST['tcredithour'])?$_POST['tcredithour']:"";     ?></td>
      <td><?php echo isset($_POST['tgrade'])?$_POST['tgrade']:"";     ?></td>
      <td><?php echo isset($_POST['grade'])?round($_POST['grade'],2):"";     ?></td>
     
     </tr>

  
 <tr>
      <td>Cumulative Average</td>
      
<td><?php echo isset($_POST['Ctcredithour'])?$_POST['Ctcredithour']:"";     ?></td>
      <td><?php echo isset($_POST['Ctgrade'])?$_POST['Ctgrade']:"";     ?></td>
      <td><?php echo isset($_POST['Cgrade'])?round($_POST['Cgrade'],2):"";     ?></td>
     
    </tr>





  </table>
</div>



<br/><br/>

<div> Acadamic Standing : 
</div>
<div>Repeated : ______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________ <br/>___________________________________________________________________________________________________________________________________________________________________________________</div>


<div>Remarks :</div>






<div class="w3-cell-row" style="margin-top: 150px; ">
  <div class="w3-container  w3-cell" style="float: left;">
    <p><b><u></u></b></p>
    <p>Date of Issue</p>
  </div>
  <div class="w3-container  w3-cell" style="float: right;">
    <p>___________________________________</p>
    <p>Sun Daero College</p>
    <p>Office Of The  Registrar</p>
  </div>
</div>





</div>
</div>

<?php } ?>

<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}


</script>

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

