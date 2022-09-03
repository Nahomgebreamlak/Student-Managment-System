<?php

session_start();
$_SESSION["ccode"]= $_POST['hid'];
echo $_POST['hid'];
echo $_SESSION["ccode"];
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
//include("../include/sidenav.php");

include("../include/navigation.php");
include("../include/footer.php");
?>

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
$sql="select * from course where ccode='".$_SESSION["ccode"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 



?>





<div style="margin-left:25%">

<form action="editcourse.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
<h2 class="w3-center">Add Course</h2>
 

 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Course Name</i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="cname" type="text" value= '<?php echo $row['cname']; ?>' required />
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Course Code</i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="ccode" type="text" placeholder="Course Code"  value= '<?php echo $row['ccode']; ?>'required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Credit Hour</i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="chour" type="text" placeholder="Credit Hours"  value= '<?php echo $row['credithours']; ?>' required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Pri Requist</i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="prirequest" type="text" placeholder="Pri Requist" value= '<?php echo $row['prirequest']; ?>' required>
    </div>
</div>







<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Year to be taken</div>
    <div class="w3-rest">
    <select class="w3-select w3-border w3-round-large" name="ytaken" required>
    

    <option value="1" <?php if($row['tyear']=='1'){echo "selected='true'";} ?> >1</option>
    <option value="2" <?php if($row['tyear']=='2'){echo "selected='true'";} ?> >2</option>
    <option value="3" <?php if($row['tyear']=='3'){echo "selected='true'";} ?> >3</option>
    <option value="4" <?php if($row['tyear']=='4'){echo "selected='true'";} ?> >4</option>
    <option value="5" <?php if($row['tyear']=='5'){echo "selected='true'";} ?> >5</option>
    
  
  </select>    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Semester</div>
    <div class="w3-rest">
    <select class="w3-select w3-border w3-round-large" name="semester" required>
    <option value="first" <?php if($row['semester']=='First'){echo "selected='true'";} ?>>First</option>
    <option value="second" <?php if($row['semester']=='Second'){echo "selected='true'";} ?>>Second</option>
    <option value="summer" <?php if($row['semester']=='Summer'){echo "selected='true'";} ?> >Summer</option>
  </select>    </div>
</div>



<p class="w3-center">
<input type="submit" name="add" class="w3-button w3-section w3-blue w3-ripple" value="Update Course "/>  

</p>
</form>
<?php
   }
} else {
    echo "0 results";
}


?>

<?php
        if(isset($_POST['add'])){

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


$cname = $_POST['cname'];
$ccode = $_POST['ccode'];
$chours = $_POST['chour'];
$semester = $_POST['semester'];
//$faculty = $_POST['faculty'];
//$department = $_POST['department'];
$tyear = $_POST['ytaken'];
$pri = $_POST['prirequest'];




$sql= " update course set ccode='".$ccode."' ,cname ='".$cname."' , credithours'".$chours."' , semester='".$semester."' , tyear='".$tyear."' prirequest ='".$pri."' where ccode='".$_SESSION["ccode"]."' " ;


echo '<div class="w3-red">';
echo $sql;
echo "</div>";





$conn->close();
        }
?>


        </div>
