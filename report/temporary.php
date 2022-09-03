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
<form action="temporary.php" method="post"> 
<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round" required /> </input>
</div>
<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>

<div class="w3-panel" style="margin-left: 50%;">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Temporary</b></h1>
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

$sql = "SELECT fname,lname,gname,Faculty,Department,Typeofenrollment,year FROM student where (sid='".$_POST['searchinput'] ."'  OR fname='".$_POST['searchinput']."') and  (remark IS NULL OR
remark ='')";
//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

   $_POST['fname']=$row['fname'];
   $_POST['lname']=$row['lname'];
   $_POST['gname']=$row['gname'];
   $_POST['Faculty']=$row['Faculty'];
   $_POST['Department']=$row['Department']; 
   
  $_POST['admission']=$row['Typeofenrollment']; 
  $_POST['year']=$row['year']; 
?>


<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>

<div style="margin-left:25%" id="printMe">

<div class="w3-cell-row" style="width:100%">
<div class="w3-container  w3-cell" style="width:15%">
<img src="../images/sandaero.png" style="width:140px ; height:125px" >
</div>
<div class="w3-container w3-cell" >
<h1  style=" font-size: 250%;" class="w3-wide w3-rest"> <font face="Broadway">  Sun daero College</font></h1> 
<h1  style=" font-size: 250%; padding-top: 5px; margin-left: 80px;class="w3-wide"><font face="Geez Able">ሳን ዳዕሮ ኮሌጅ</font></h1> 
</div>
</div>



<div class="w3-cell-row" style="width:100%">
<div class="w3-container  w3-cell" style="width:15%">
<p style="width: 100px;
    height: 100px;
   border: 3px solid #73AD21;"></p>
</div>
<div class="w3-container w3-cell" >
<h1  style="font-size: 150%; margin-left: 15px;" class="w3-wide w3-rest">OFFICE OF THE REGISTRAR</h1>
<p style="font-size: 150%;float: right;"><b>Date <u><?php 



echo date("Y/M/d");
















?></u> </b></p>
</div>
</div>



<b><div style="text-align:center; font-size: 190%;"><font face="Lucida Calligraphy"> Temporary Certificate of Graduation</font></div></b>
<div style="text-align: center; font-size: 150%;"> This is to certify that</div>
<u><b><div style="text-align:center; font-size: 200%; text-transform: uppercase; margin-top: 5px;"><?php echo $_POST['fname'] .'&nbsp; ' .$_POST['lname'] .'&nbsp;' .$_POST['gname'] ; ?></div></b></u>
<div style="text-align: center; font-size: 150%; margin-top: 10px;"> Graduated from the Department of <?php echo $_POST['Department'];?></div>
<div style="text-align: center; font-size: 150%; margin-top: 15px;">With B.A Degree</div>
<div style="text-align: center; font-size: 150%; margin-top: 15px;">In</div>
<div style="text-align: center; font-size: 150%; margin-top: 15px;"><?php echo $_POST['Department'];?></div>
<div style="text-align: center; font-size: 150%; margin-top: 15px;">On <b><?php 

$sqly = "select date from graduation where admission='".$_POST['admission']."' and year='".$_POST['year']."'";
$result = $conn->query($sqly);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<input type='text' value='".$row['date']."' style='border:0;' >";
//echo $row['date'];


}

}

//echo date("Y/M/d");






?></b></div>

<div style="text-align: center; font-size: 150%; margin-top: 40px;">This certificate of graduation has been given pending the printing and  Issuance of the actual diploma</div>



<div class="w3-cell-row" style="margin-top: 50px;">
<div class="w3-container w3-cell">
<div style="text-align: center; font-size: 150%; margin-top: 20px;">_________________________</div>

<div style="text-align: center; font-size: 150%; margin-top: 5px;">College Dean</div>

</div>
<div class="w3-container w3-cell">

</div>
</div>


</div>





<?php

    }
} else {
    echo "<div style='margin-left:20%;' class='w3-panel w3-pale-green'>";
   echo " No Student with this Id Or has Some remark";
echo "</div>";
}
$conn->close();


?>



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

