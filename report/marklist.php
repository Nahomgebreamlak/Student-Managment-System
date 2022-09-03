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
         
          $('#books').append('<option selected>select Department</option>');
          
          books.forEach(function(book){
            $('#books').append('<option value="'+book.departmentname +'">' + book.departmentname + '</option>')
          })
        })
      })
    })
  </script>






<?php

function loadgrade($sid){

//echo "function called"; 
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

$totalpoint=0;
$gradepoint=0;
$ccc=isset($_POST['coursecount'])?$_POST['coursecount']:1;
for ($j=1; $j < $ccc; $j++) { 
$ccode="ccode".$j;
$credih="crh".$j;
$cnames="cname".$j;
$cid=$_POST[$ccode];
$cname=$_POST[$cnames];

$sql="select * from grade where sid= '".trim($sid) ."' and (courseid ='".trim($cid) ."' or courseid ='".trim($cname)."')";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
 
echo "<td>";
echo $row['Agrade'];
echo "</td>";

//echo "credit hour ".$_POST[$credih] . "<br>";
//echo "Grade point " . $row['Ngrade']. "<br>";


$gradepoint=$row['Ngrade'] * $_POST[$credih]; 
//echo " gradepoint". $gradepoint . "<br>";

$totalpoint = $gradepoint + $totalpoint;
//echo "totalpoint" .$totalpoint ."<br/>" ;
$_POST['ttp']=$totalpoint;

    }
 

} else {


echo "<td>";
echo "NG";
echo "</td>";
}



}

$tty=isset($_POST['totalcredithour'])?$_POST['totalcredithour']:1;

$lastgrade =$totalpoint/$tty;

return $lastgrade;

}
?>



<?php
require_once("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");

//include("../include/navigation.php");
include("../include/footer.php");

?>

<style type="text/css">
	td{
	writing-mode: vertical-rl;
text-orientation: upright;

}

</style>

<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">

<form action="marklist.php" method="post"> 
<div class="w3-container w3-cell">
 <select class="w3-select w3-border w3-round-large" id="authors" name="faculty">
                          <option selected="" disabled="">Select Faculty</option>
                          <?php 
                            require '../include/data.php';
                            $authors = loadAuthors();
                            foreach ($authors as $author) {
                              echo "<option id='".$author['facultyname']."' value='".$author['facultyname']."'>".$author['facultyname']."</option>";
                  }
                           ?>
                        </select>

</div>




<div class="w3-container w3-cell">
 <select class="w3-select w3-border w3-round-large" id="books" name="department">
                        <option selected="" disabled="">Select department</option>
                            
                        </select>
</div>






<div class="w3-container w3-cell">
 <select class="w3-select w3-border w3-round-large"  name="typeofenrollment">
    <option value="RE">Regular</option>
  <option value="EX" >Extension</option>
 <option value="WE" >Week end</option>
 <option value="DIS">Distance</option>
                        </select>
</div>



<div class="w3-container w3-cell">

<select  class="w3-select w3-border w3-round-large " name="section" >
<option value="" disabled selected>Section</option>
    
        <?php 

          $mydb->setQuery("SELECT * FROM `section`");
          $cur = $mydb->loadResultList();

          foreach ($cur as $result) {
            echo '<option value='.$result->section.'>'.$result->section.'</option>';

          }
        ?> 
      </select> 


</div>
















<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round" required placeholder="Year" /> </input>
</div>


<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>




<div class="w3-panel" style="margin-left: 50%;">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Attendance Sheet</b></h1>
</div>
<?php if(isset($_POST['faculty']) && isset($_POST['department']) && isset($_POST['searchinput'])) { 
 
 ?>
<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>
<div style="margin-left:25%"  id="printMe">

<?php 

echo  '<img src="../images/sun daero college.png" style="width:100px ; height:70px ; float: left; margin-left:25px;">';

echo "Sun Daero college <br/>";
echo "Attendance <br/>";

echo "OFFICE OF THE REGISTRAR <br/>";
echo "Department  : ".$_POST['department']. " Acadamic year :". $_POST['searchinput']." section : ". $_POST['section'] ."<br/>";
echo "Program type:___________________ Admission type:(".$_POST['typeofenrollment'].")<br/>";
echo "Course Title:___________________ Instructor Name:_________________________";
echo "Signiture :____________";
?>



<div class="w3-container">
  
  <table class="w3-table-all" border="1">



    <tr>
      <th >No.</th>
      <th style="width: 1000px;"> Student's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>Student's ID</th>
      
      <th>Sex</th>
      <th style="font-size: 10px">
        Day1______<br/>
        Date______
        
      </th>
 <th style="font-size: 10px">
        Day2______<br/>
        Date______
        
      </th>
       <th style="font-size: 10px">
        Day3______<br/>
        Date______
        
      </th>
       <th style="font-size: 10px">
        Day4______<br/>
        Date______
        
      </th>
       <th style="font-size: 10px">
        Day5_____________<br/>
        Date_____________
        
      </th>
       <th style="font-size: 10px">
        Day6_____________<br/>
        Date_____________
        
      </th>
       <th style="font-size: 10px">
        Day7_____________<br/>
        Date_____________
        
      </th>
       <th style="font-size: 10px">
        Day8_____________<br/>
        Date_____________
        
      </th>

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




$sql="select fname,lname,gname ,sid , sex From  Student where department='" .$_POST['department'] ."' and Faculty='".$_POST['faculty'] ."' and year ='".$_POST['searchinput']. "' and section='".$_POST['section']."' and typeofenrollment='".$_POST['typeofenrollment']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
 $j=0;
 
$values = array();

    while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $i ."</td>";
echo "<td >".$row['fname'].' ' .$row['lname'].' '.$row['gname'] ;
echo "<td>" .$row['sid']. "</td>";
echo "<td>" .$row['sex']. "</td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";





echo "</tr>";
$j++;
$i++;
    }
    //loadrank();
} else {
    echo "No Students are Available";
}

 
$conn->close();










?>

    




</div>




</div>









<?php
function loadrank(){

$ordered_values = $values;
rsort($ordered_values);

foreach ($values as $key => $value) {
    foreach ($ordered_values as $ordered_key => $ordered_value) {
        if ($value === $ordered_value) {
            $key = $ordered_key;
            break;
        }
    }
    //echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';

echo "<tr>";
echo "<td>" . ((int) $key + 1)  ."<td>" ;
echo "</tr>";

}

}

?>
  </table>
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
