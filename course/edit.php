<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}else{

 $_SESSION['role']=$_SESSION['role']; 
}

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];

   $_POST['faculty']= isset($_SESSION['faculty'])?$_SESSION['faculty']:null;
   $_POST['department']= isset($_SESSION['department'])?$_SESSION['department']:null;

} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;

?>


<head>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../css/jquery.min.js"></script>
    <script src="../css/bootstrap.min.js"></script>
</head>
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


<div class="w3-cell-row ">

  <div class="w3-container  w3-cell" style="float: right;">
<form action="edit.php" method="post"> 
<div class="w3-container w3-cell">
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
 <select class="w3-select w3-border w3-round-large" id="books" name="department" required >
                        <option selected="" disabled=""  >Select department</option>
                            
                        </select>
</div>

<div class="w3-container w3-cell">
 <select class="w3-select w3-border w3-round-large" id="booksdfgdfgd" name="admission" required>
                        <option  value="RE">Regular</option>
                         <option value="EX">Extension</option>
                        
                        </select>
</div>


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
  <b>Edit Course</b></h1>
</div>
<div class="w3-container">
 

<?php

if(isset($_POST['faculty'])&& isset($_POST['department'])){
//echo " searchinput ". $_POST['searchinput'];
?>

  <table class="w3-table-all w3-card-4 w3-padding-1" border="1" cellpadding="0" >
    <tr>
    <th>CID</th>
      <th width="700">Course Name</th>
      <th>Course Code</th>
      <th>Credit Hours</th>
      <th>Pri Request</th>
      <th>Taken year</th>
      <th>Semester</th>
      <th>Admission </th>
      <th>Action</th>
      
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

$test=isset($_POST['searchinput'])?$_POST['searchinput']:'';

if(!isset($_POST['searchinput'])|| trim($_POST['searchinput'])=='')
{
$sccode=" ";

}else{

$sccode=" and  ccode='". $_POST['searchinput']."'";


}




$total_pages_sql = "SELECT COUNT(*) FROM course";
$result = $conn->query($total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$_POST['admission']=isset($_POST['admission'])?$_POST['admission']:"RE";
//echo($total_pages);
$sql = "SELECT * FROM `course` WHERE faculty='".$_POST['faculty']."' and department='".$_POST['department']."'  and admission='".$_POST['admission'] ."' ORDER BY id desc".$sccode."     LIMIT $offset, $no_of_records_per_page ";
//echo $sql;
$_SESSION['faculty']=$_POST['faculty'];
$_SESSION['department']=$_POST['department'];


//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $i=1;
    while($row = $result->fetch_assoc()) { 


$var=urlencode($row['ccode']);


echo '<form method="post"  action =edit.php?hid='.$var.'>';

echo '<tr>';
echo "<td>" .$i. "</td>";
echo "<td><input type='text' class='w3-input' name='tcname' value='" .$row['cname']. "'</td>";
echo "<td> <input type='text' class='w3-input' name='tccode' value='" .$row['ccode']. "'</td>";

echo "<td><input type='text' class='w3-input' name='tchr' value='" .$row['credithours']. "'</td>";
echo "<td><input type='text' class='w3-input' name='tpri' value='" .$row['prirequest']. "'</td>";

echo "<td><input type='text' name='tyear'  class='w3-input' value='" .$row['tyear']. "'</td>";

echo "<td><input type='text' name='tsemester' class='w3-input' value='" .$row['semester']. "'</td>";
echo "<td><input type='text' name='tsemester' class='w3-input' value='" .$row['admission']. "'</td>";



echo '<td>'      ;




echo "<div class='w3-container w3-cell'>";
echo "<input type='submit' value='Update' class='w3-input w3-green' name='edit'/>";   
echo "</div>";
echo "<div class='w3-container w3-cell'>";

 echo "<input type='submit' value='Delete' class='w3-input w3-red' name='delete'/>";   

echo "</div>";






echo "</td>";
echo '</tr>';
echo "</form>";
$i++;

      }


} else {
    echo "No Course with this Search";
}



?>
 
  </table>

<ul class="pagination">

    <li><a href="edit.php?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="edit.php<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="edit.php<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="edit.php?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>


</div>








</div>

<?php } ?>

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

if(isset($_POST['edit'])){

 $var2=urldecode($_GET['hid']);


$prirequest=isset($_POST['tpri'])?$_POST['tpri']:"";
$sql= "update course set ccode='".$_POST['tccode']."' ,cname ='".$_POST['tcname']."' , credithours='".$_POST['tchr']."' , semester='".$_POST['tsemester']."' , tyear='".$_POST['tyear']."' ,prirequest ='".$prirequest."' where ccode='".$var2."' " ;
//echo $sql;
if ($conn->query($sql) === TRUE) {


echo '<div class="w3-card-4 w3-pale-green">';
echo "Record Updateed successfully";
echo "</div>";
} else {
    echo "Error deleting record: " . $conn->error;
}


}
if(isset($_POST['delete'])){
   $var2=urldecode($_GET['hid']);

$sql ="delete from course where ccode='".$var2."'";


if ($conn->query($sql) === TRUE) {
echo '<div class="w3-card-4 w3-red">';
echo "Record deleted successfully";
echo "</div>";

} else {
    echo "Error deleting record: " . $conn->error;
}


}

?>



