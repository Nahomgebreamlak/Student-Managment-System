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
           
   $('#course').append('<option value="'+book.cname +'">' + book.cname + '</option>')
         
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







<div class="w3-panel w3-blue w3-round" style="margin-left:20%">
  <p> SanDaro College</p>
<div class="w3-cell-row">
<form class="w3-container w3-card-4" action="attandance.php" method="post">
  <div class="w3-container w3-cell">
   <select class="w3-select w3-border w3-round-large" name="year" required>
    <option value="" disabled selected>year</option>
    <?php 

$mydb->setQuery("SELECT * FROM `year`");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
  echo '<option value='.$result->year.'>'.$result->year.'</option>';

}?>
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







  <div class="w3-container  w3-cell">
     <select class="w3-select w3-border w3-round-large" name="semester" required>
    <option value="" disabled selected>Semester</option>
    <option value="First">First</option>
    <option value="Second">Second</option>
    <option value="Summer">Summer</option>
  </select>
  </div>
  <div class="w3-container  w3-cell">
    
        <select class="w3-select w3-border w3-round-large" id="authors" name="faculty" required>
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
           <select class="w3-select w3-border w3-round-large" id="books" name="department" required>
                        <option selected="" disabled="">Select department</option>
                            
                        </select>
  
  </div>
 
 
  <div class="w3-container w3-cell">
    <select class="w3-select w3-border w3-round-large" id="course" name="course" required>
               <option selected="" disabled="">Select course</option>
                                     
                        </select>
  </div>
 
 
 
 
 
  <div class="w3-container  w3-cell">
     <select class="w3-select w3-border w3-round-large" name="yearofstudy" required>
    <option value="" disabled selected>Year of Studey</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
 
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
  </div>
  <div class="w3-container w3-cell" > 

<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
  </div>
</form>
</div>

</div>




<div class="w3-panel" style="margin-left: 50%;">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Mark List</b></h1>
</div>
<?php if(isset($_POST['faculty']) && isset($_POST['department'])) { 





  ?>
<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>
<div style="margin-left:25%"  id="printMe">


<?php 


echo  '<img src="../images/sun daero college.png" style="width:100px ; height:70px ; float: left; margin-left:25px;">';
  
echo "<div style='float:right;''>";
echo "sun daero  College";
echo " Mark list<br/>";

echo "Program: Degree <br/>";
echo "Admission: (".$_POST['typeofenrollment'].") <br/>";
echo "Year : ".$_POST['yearofstudy']. "&nbsp;&nbsp;   Semester : ".$_POST['semester']."<br/>";
echo "Course: <br/>".$_POST['course'];
echo "</div>";

echo "sun daero  College <br/>";
echo " Mark list<br/>";

echo "OFFICE OF THE REGISTRAR <br/>";
echo "Department  : ".$_POST['department']. " Acadamic year :". $_POST['year']." section : ". $_POST['section'] ."<br/>";
echo "Program type:___________________ Admission type:(".$_POST['typeofenrollment'].")<br/>";
echo "Course Name:".$_POST['course']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> Instructor Name:_________________________";
echo "Signiture :____________";
?>

<div class="w3-container">
  
  <table class="w3-table-all" border="1">



    <tr>
      <th >No.</th>
      <th style="width: 10px;"> Student's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>Student's ID</th>
      
      <th>Sex</th>
      <th style="font-size: 10px">
        Quize<br/>
        10%
        
      </th>
 <th style="font-size: 10px">
        Assignment <br/>
        15%
        
      </th>
       <th style="font-size: 10px">
        Mid-EXam<br/>
        25%
        
      </th>
       <th style="font-size: 10px">
        sub-total<br/>
        50%
        
      </th>
       <th style="font-size: 10px">
        Final-Exam<br/>
        50%
        
      </th>
       <th style="font-size: 10px">
        Total<br/>
        100%
        
      </th>
       <th style="font-size: 10px">
        Grade        
      </th>
       <th class="w3-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
       <th style="font-size: 10px">
        Student Id
       </th>

<th style="font-size: 10px">
        Grade
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




$sql="select fname,lname,gname ,sid , sex From  Student where department='" .$_POST['department'] ."' and Faculty='".$_POST['faculty'] ."' and year ='".$_POST['year']. "' and section='".$_POST['section']."'";

//echo $sql;
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
echo '<th class="w3-black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';

echo "<td>" .$row['sid']. "</td>";



$sid=$row['sid'];








$cname="";
$ccode="";

$sql1 = "SELECT cname,ccode FROM course where cname='".$_POST['course']."'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $cname=$row['cname'];
      $ccode=$row['ccode'];
      
       }
} else {
    echo "No Course";
}



$sql2="select Agrade from grade where sid= '".trim($sid) ."' and (courseid ='".trim($cname) ."' or courseid ='".trim($ccode)."')";


$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
   
      
	echo "<td>";
    echo $row['Agrade'];
    echo "</td>";
       }
} else {
	echo "<td>";
    echo "NG";
    echo "</td>";
}























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
