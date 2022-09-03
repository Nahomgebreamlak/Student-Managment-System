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
require_once("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");
include("../include/footer.php");

?>

<style type="text/css">
	td{
	writing-mode: vertical-rl;
text-orientation: upright;

}

</style>

<div class="w3-cell-row ">

  <div class="w3-container  w3-cell" style="float: right; margin-left: 20%">

<form action="Studentreport.php" method="post"> 
  <div class="w3-panel" style="">
  <div class="w3-panel" style="">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Student Report</b></h1>
</div>
  <table class="w3-table-all  " border="1" cellpadding="1px" cellspacing="1px" >

<tr>

<td>
  <label>Address</label>
 </td>

<td>
  <label>Date of Birth</label>
</td>
<td><label>Place of Birth</label>
</td>

<td><label>NATIONALITY</label>

</td>

<td><label>Contact Number</label>

</td>


<td><label>Admission Type</label>

</td>

<td><label>Faculity</label>

</td>


<td><label>Department</label>

</td>





</tr>

<tr>
  <td>
  
 <input  type="checkbox" name="address" class="w3-check" />

</td>

  <td>
  
  <input  type="checkbox" name="BIRTHDATE" class="w3-check" />

</td>
  <td>
  <input  type="checkbox" name="BIRTHPLACE" class="w3-check" />

  

</td>
  <td>
  
  <input  type="checkbox" name="NATIONALITY" class="w3-check" />

</td>
  <td>
  
  <input  type="checkbox" name="CONTACT" class="w3-check" />

</td>
  <td>
  
  <input  type="checkbox" name="admission" class="w3-check" />

</td>
  <td>
  <input  type="checkbox" name="facultyS" class="w3-check" />
  

</td>
  <td>
  <input  type="checkbox" name="departmentS" class="w3-check" />
  

</td>
  
</tr>














<tr>


<td><label>Civil Status</label>
 
</td>


<td><label>Gaurdian</label>
</td>

<td><label>Gaurdian Contact Number</label>

</td>
<td><label>CGPA</label>

</td>

<td><label>10 <sup>th</sup>  Grade result</label>
</td>


<td><label>12 <sup>th</sup>  Grade result</label>

</td>
<td><label> Remark</label>

</td>
</tr>



<tr>
  <td>
  <input  type="checkbox" name="CIVILSTATUS" class="w3-check" />
   
  </td>
<td>
  <input  type="checkbox" name="GUARDIAN" class="w3-check" />

    
  </td>
<td>
  <input  type="checkbox" name="GCONTACT" class="w3-check" />
    
  </td>

<td>
  <input  type="checkbox" name="GCONTACT" class="w3-check" />
    
  </td>

<td>
  <input  type="checkbox" name="tenresult" class="w3-check" />

    
  </td>
<td>
  <input  type="checkbox" name="twelivesthresult" class="w3-check" />
    
  </td>
<td>
  <input  type="checkbox" name="remark" class="w3-check" />
    
  </td>
</tr>


</table>


</div>


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










<?php if(isset($_POST['faculty']) && isset($_POST['department']) && isset($_POST['searchinput'])) { ?>
<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>


<div style="margin-left:25%"  id="printMe">






<div class="w3-container">
  
  <table class="w3-table-all " border="1" cellpadding="1px" cellspacing="1px" >
    
<style type="text/css">

table{
cellpadding:0px;
cellspacing:0px;
}

</style>

    <tr>
      <th >No.</th>
      <th>Student's Name</th>
      <th>SID</th>
      <th>Sex</th>
      
     <?php
$_POST['selected']='';
$X=0;
if(isset($_POST['address'])){
  $X ++;
  echo "<td>
  <label>Address</label>
 </td>";
$_POST['selected'].='Address ,';

}      


if(isset($_POST['BIRTHDATE'])){
  
  $X ++;
  echo "<td>
  <label>Date of Birth</label>
</td>
";
$_POST['selected'].='DBdate ,';
}    
if(isset($_POST['BIRTHPLACE'])){
  $X ++;
  echo "<td><label>Place of Birth</label>
</td>
";
}    

if(isset($_POST['NATIONALITY'])){
  $X ++;
  echo "<td><label>NATIONALITY</label></td>";
$_POST['selected'].='NATIONALITY ,';

}    

if(isset($_POST['Contact'])){
  $X ++;
  echo "<td><label>Contact Number</label>

</td>
";
$_POST['selected'].='Contactno ,';

}    


if(isset($_POST['admission'])){
 $X ++;
  echo "<td><label>Admission Type</label></td>";

$_POST['selected'].=' Typeofenrollment ,';

}    

if(isset($_POST['facultyS'])){
  $X ++;
  echo "<td><label>Faculity</label>

</td>

";

$_POST['selected'].='faculty ,';
 

}    

if(isset($_POST['departmentS'])){
  $X ++;
  echo "<td><label>Department</label>
</td>";

$_POST['selected'].='department ,';


}    

if(isset($_POST['CIVILSTATUS'])){
$X ++;
  echo "<td><label>Civil Status</label></td>";

$_POST['selected'].='CIVILSTATUS ,';

}    


if(isset($_POST['GUARDIAN'])){
 $X ++;
  echo "<td><label>Gaurdian</label>
</td>
";

$_POST['selected'].='Gradianname ,';

}    

if(isset($_POST['GCONTACT'])){
 $X ++;
  echo "<td><label>Gaurdian Contact Number</label></td>";
$_POST['selected'].='Gardiancontact ,';

}    

if(isset($_POST['cgpa'])){
 $X ++;
  echo "
<td><label>CGPA</label>

</td>";

$_POST['selected'].='cgpa ,';


}    
  if(isset($_POST['tenresult'])){
    $X ++;
  echo "<td><label>10 <sup>th</sup>  Grade result</label>
</td>
";
$_POST['selected'].='tenthgraderesult ,';


}  if(isset($_POST['twelivesthresult'])){
  $X ++;
  echo "<td><label>12 <sup>th</sup>  Grade result</label>
</td>

";

$_POST['selected'].='twelivethgraderesult ,';


}  

 if(isset($_POST['remark'])){
  //$X ++;
  //echo "<td><label>Remarkss</label>
//</td>

//";

$_POST['remark']="and  (
remark !='')";


}





$_POST['coursecount'] =$X;



      ?>
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

$selected=', '.substr($_POST['selected'], 0, -1);



$_POST['remark']=isset($_POST['remark'])?$_POST['remark']:" and  (remark IS NULL OR
remark ='')";
$sql="select fname,lname,gname ,sid , sex  ". $selected. "From  Student where section='".$_POST['section']."' and Typeofenrollment='".$_POST['typeofenrollment']."' and department='" .$_POST['department'] ."' and Faculty='".$_POST['faculty'] ."' and year ='".$_POST['searchinput']. "'  ". $_POST['remark'];

echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
 $j=0;
 $z=1;
$values = array();

    while($row = $result->fetch_array()) {
echo "<tr>";
echo "<td>" . $z ."</td>";
echo "<td>".$row[0].' ' .$row[1].' '.$row[2] ;
echo "<td>" .$row[3]. "</td>";
echo "<td>" .$row[4]. "</td>";

//echo " Number Of selected".  $_POST['coursecount'];
$var=isset($_POST['coursecount'])?$_POST['coursecount']:0;

for ($i=0 ;$i <$var; $i++) {
$varx=5 + $i; 
echo "<td>" .$row[$varx]. "</td>";

}





echo "</tr>";
$j++;
$i++;
$z++;
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

$selected=''; 

if(isset($_POST['address'])){
$selected.='address,';
}      


if(isset($_POST['BIRTHDATE'])){
$selected.='DBdate';
  
}    
if(isset($_POST['BIRTHPLACE'])){
  echo "<td><label>Place of Birth</label>
</td>
";
}    

if(isset($_POST['NATIONALITY'])){
  echo "<td><label>NATIONALITY</label></td>";
}    

if(isset($_POST['Contact'])){
  echo "<td><label>Contact Number</label>

</td>
";
}    


if(isset($_POST['admission'])){
  echo "<td><label>Admission Type</label></td>";
}    

if(isset($_POST['faculty'])){
  echo "<td><label>Faculity</label>

</td>

";
}    

if(isset($_POST['department'])){
  echo "<td><label>Department</label>
</td>";
}    

if(isset($_POST['CIVILSTATUS'])){
  echo "<td><label>Civil Status</label></td>";
}    


if(isset($_POST['GUARDIAN'])){
  echo "<td><label>Gaurdian</label>
</td>
";
}    

if(isset($_POST['GCONTACT'])){
  echo "<td><label>Gaurdian Contact Number</label></td>";
}    

if(isset($_POST['cgpa'])){
 
  echo "
<td><label>CGPA</label>

</td>";
}    
  if(isset($_POST['tenresult'])){
  echo "<td><label>10 <sup>th</sup>  Grade result</label>
</td>
";
}  if(isset($_POST['twelivesthresult'])){
  echo "<td><label>12 <sup>th</sup>  Grade result</label>
</td>

";
}  







$sql="select ".$selected . " from Student where sid= '".$sid ."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
$j=0;
    while($row = $result->fetch_array()) {
 
echo "<td>";
echo $row[$j];
echo "</td>";
$j++;
    }
 

} else {

echo " ";
}



}


}
?>
