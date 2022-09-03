<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
?>

<style type="text/css">
  
#response {
    padding: 10px;
    margin-top: 10px;
 margin-left: :25%; 
    border-radius: 2px;
    display:none;
}
</style>

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


<?php


require_once("../include/database.php");
include("../include/header.php");
include("../include/sidenav.php");

//include("../include/navigation.php");
include("../include/footer.php");
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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO course (cname,ccode,credithours,semester,Faculty,Department,tyear,prirequest,admission) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss", $cname, $ccode,$chours,$semester,$faculty,$department,$tyear,$pri,$admission);


$cname = $_POST['cname'];
$ccode = $_POST['ccode'];

$chours = $_POST['chour'];
$semester = $_POST['semester'];

$faculty = $_POST['faculty'];
$department = $_POST['department'];

$tyear = $_POST['ytaken'];
$pri = $_POST['prirequest'];
$admission=$_POST['typeofenrollment'];

$sql = "SELECT cname FROM course where cname='".$cname."' and ccode='".$ccode."' and admission='".$_POST['typeofenrollment']."' and department='".$_POST['department']."' and faculty='".$_POST['faculty']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo '<div class="w3-card-4 w3-red w3-xlarge" style="margin-left:20%;">';

echo " Course Already Inserted";

echo "</div>";

}else{

$stmt->execute();

echo '<div class="w3-card-4 w3-pale-green w3-xlarge" style="margin-left:20%;">';

echo "New Course created successfully";

$message="New Course created successfully";

echo "</div>";


}





$stmt->close();
$conn->close();
        }
?>


<div style="margin-left:25%">


<form action="add.php" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="post">
<h2 class="w3-center">Add Course </h2>
 
 <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
   
 <div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Course Name <b style="color:red">*</b> </div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="cname" type="text" placeholder="Course Name" required>
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Course Code<b style="color:red">*</b> </div>
    <div class="w3-rest">
      <input required class="w3-input w3-border" name="ccode" type="text" placeholder="Course Code">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Credit Hour<b style="color:red">*</b> </div>
    <div class="w3-rest">
      <input required class="w3-input w3-border" name="chour" type="number" placeholder="Credit Hours">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Pri Requist</i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="prirequest" type="text" placeholder="Pri Requist">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Faculty <b style="color:red">*</b>  </div>
    <div class="w3-rest">
       <select required class="w3-select w3-border w3-round-large" id="authors" name="faculty">
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




</div>

<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Department <b style="color:red">*</b>  </div>
    <div class="w3-rest">
     <select required class="w3-select w3-border w3-round-large" id="books" name="department">
                        <option selected="" disabled="">Select department</option>
                            
                        </select>
        </div>
</div>


<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Year to be taken <b style="color:red">*</b> </div>
    <div class="w3-rest">
    <select required class="w3-select w3-border w3-round-large" name="ytaken">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    
  
  </select>    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-row" required  style="width:150px">Semester <b style="color:red">*</b> </div>
    <div class="w3-rest">
    <select class="w3-select w3-border w3-round-large" name="semester">
    <option value="first">First</option>
    <option value="second">Second</option>
    <option value="summer">Summer</option>
  </select>    </div>
</div>



<div class="w3-row w3-section">
  <div class="w3-row" style="width:150px">Type of Enrollment <b style="color:red">*</b> </div>
    <div class="w3-rest">
    <select  required class="w3-select w3-border w3-round-large" name="typeofenrollment">
    <option value="RE">Regular</option>
  <option value="EX" >Extension</option>
 <option value="WE" >Week end</option>
 <option value="DIS">Distance</option>
 
   </select>    </div>
</div>















<p class="w3-center">
<input type="submit" name="add" class="w3-button w3-section w3-blue w3-ripple" value="Add Course "/>  

</p>
</form>




</div>
        </div>
</div>
