<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
?>


<script src="jquery-3.4.1.min.js"></script>
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
          books.forEach(function(book){
            $('#books').append('<option>' + book.departmentname + '</option>')
          })
        })
      })
    })
  </script>


<?php
include("../include/database.php");
include("javascript.php");

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

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo $_POST['faculty'];

//echo $_POST['STUDID'];
$ayear = isset($_POST['year'])?$_POST['year']:'';
$sid = isset($_POST['STUDID'])?$_POST['STUDID']:'';
$fname = isset($_POST['FNAME'])?$_POST['FNAME']:'';
$lname= isset($_POST['LNAME'])?$_POST['LNAME']:'';
$gname = isset($_POST['GNAME'])?$_POST['GNAME']:'';
$address = isset($_POST['address'])?$_POST['address']:'';
$sex = isset($_POST['sex'])?$_POST['sex']:'';
$dbirth = isset($_POST['BIRTHDATE'])?$_POST['BIRTHDATE']:'';
$birthplace = isset($_POST['BIRTHPLACE'])?$_POST['BIRTHPLACE']:'';
$nationality = isset($_POST['NATIONALITY'])?$_POST['NATIONALITY']:'';
$contact = isset($_POST['CONTACT'])?$_POST['CONTACT']:'';
$addmission = isset($_POST['admission'])?$_POST['admission']:'';
$faculty = isset($_POST['faculty'])?$_POST['faculty']:'';
$department = isset($_POST['department'])?$_POST['department']:'';
$civilstatu = isset($_POST['CIVILSTATUS'])?$_POST['CIVILSTATUS']:'';
$gardianname = isset($_POST['GUARDIAN'])?$_POST['GUARDIAN']:'';
$Gcontact = isset($_POST['GCONTACT'])?$_POST['GCONTACT']:'';
$req1 = isset($_POST['D12level4'])?1:0;
$req2 = isset($_POST['D10level4'])?1:0;
$req3 = isset($_POST['priparatory'])?1:0;
$req4 = isset($_POST['transfer'])?1:0;
$req5 = isset($_POST['Degree']) ?1:0;
$cgpa = isset($_POST['cgpa'])?$_POST['cgpa']:" ";
$teng = isset($_POST['tenresult'])?$_POST['tenresult']:" ";
$twelevegrade = isset($_POST['twelivesthresult'])?$_POST['twelivesthresult']:" ";

$cyear = isset($_POST['scurrentyear'])?$_POST['scurrentyear']:" ";
$scurrentsemester = isset($_POST['scurrentsemester'])?$_POST['scurrentsemester']:" ";

$sid=isset($_POST['STUDID'])?$_POST['STUDID']:" ";
$remark=isset($_POST['remark'])?$_POST['remark']:" ";



$sql="update  student set  year='".$ayear."', remark='".$remark."',sid='".$sid."' , Fname='".$fname."' ,  lname='".$lname."', gname='".$gname."' , address='".$address."' , dbdate='".$dbirth."' , placeofbirth='".$birthplace."' , Nationality='".$nationality."', contactno='".$contact."' , typeofenrollment='".$addmission."' , faculty='".$faculty."' , department='".$department."' , civilstatus='".$civilstatu."' , Gradianname='".$gardianname."', gardiancontact='".$Gcontact."' , req1='".$req1."' , req2='".$req2."' , req3='".$req3."' , req4='".$req5."', tenthgraderesult='".$teng."' , twelivethgraderesult='".$twelevegrade."' , cgpa='".$cgpa."' , sex='".$sex."' , scurrentyear='".$cyear."' , scurrentsemester='".$scurrentsemester."' where sid='".$_SESSION['sid']."'";

//echo $sql;
if ($conn->query($sql) === TRUE) {


 echo '<div class="w3-card-4 w3-pale-green w3-large" style="margin-left:20%;"">';

  echo "Student updated  successfully";
  echo "</div>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}




?>



<div class="w3-cell-row w3-blue">

  <div class="w3-container w3-blue w3-cell" style="float: right;">
<form action="edit.php" method="post"> 
<div class="w3-container w3-cell">
<input type="text"  name="searchinput" class="w3-input w3-border w3-round" required /> </input>
</div>
<div class="w3-container w3-cell" > 
<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
</div>
</form>

  </div>


</div>

<div style="margin-left:25%">
<div class="w3-panel">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Edit Student</b></h1>
</div>


<?php if(isset($_POST['searchinput'])){ 


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

$sqlS = "SELECT * FROM student where sid='".$_POST['searchinput']."'";
$resultS = $conn->query($sqlS);
//echo $sqlS;
if ($resultS->num_rows > 0) {
    // output data of each row
    while($row = $resultS->fetch_assoc()) {
    

$_SESSION['sid']=$row['sid'];

$_POST['year']=$row['year'];
$_POST['STUDID']=$row['sid'];
$_POST['FNAME']=$row['Fname'];
$_POST['LNAME']=$row['Lname'];
$_POST['GNAME']=$row['gname'];
$_POST['address']=$row['address'];
$_POST['sex']=$row['sex'];
$_POST['BIRTHDATE']=$row['DBdate'];
$_POST['BIRTHPLACE']=$row['placeofbirth'];
$_POST['NATIONALITY']=$row['Nationality'];
$_POST['CONTACT']=$row['Contactno'];
$_POST['admission']=$row['Typeofenrollment'];
$_POST['faculty']=$row['Faculty'];
$_POST['department']=$row['Department'];
$_POST['CIVILSTATUS']=$row['Civilstatus'];
$_POST['GUARDIAN']=$row['Gradianname'];
$_POST['GCONTACT']=$row['Gardiancontact'];
$_POST['D12level4']=$row['req1'];
$_POST['D10level4']=$row['req2'];
$_POST['priparatory']=$row['req3'];
$_POST['transfer']=$row['req4'];
$_POST['Degree'] =$row['req5'];
$_POST['cgpa']=$row['cgpa'];
$_POST['tenresult']=$row['tenthgraderesult'];
$_POST['twelivesthresult']=$row['twelivethgraderesult'];

$_POST['scurrentyear']=$row['scurrentyear'];
$_POST['scurrentsemester']=$row['scurrentsemester'];
$_POST['remark']=$row['remark'];






?>


<form action="edit.php" class="w3-container" method="post" >
  <div >
  <div ><h2>Add New Student</h2></div> 
  <label >Academic Year: </label>
  <div >
     <select  class="w3-select w3-border w3-round-large " name="year" style="width:30%">
        <?php 

          $mydb->setQuery("SELECT * FROM `year`");
          $cur = $mydb->loadResultList();

          foreach ($cur as $result) {
            echo '<option value='.$result->year.'>'.$result->year.'</option>';

          }
        ?> 
      </select> 
<label >Section: <b style="color:red">*</b></label>
 
<select  class="w3-select w3-border w3-round-large " name="section" style="width:30%">
        <?php 

          $mydb->setQuery("SELECT * FROM `section`");
          $cur = $mydb->loadResultList();

          foreach ($cur as $result) {
            echo '<option value='.$result->section.'>'.$result->section.'</option>';

          }
        ?> 
      </select> 


    </div> 

    
    <table >
      
<tr> 
<td><label>Student ID</label> </td>
  <td>
     
      <input class="w3-input w3-border w3-round-large"  type="text" name="STUDID" value="<?php  echo isset($_POST['STUDID']) ? $_POST['STUDID'] : '';?>" >
     

</td>
<td><label>Year Of Studey</label></td> 

<td>
      <input class="w3-input w3-border w3-round-large"  type="text" name="scurrentyear" value="<?php  echo isset($_POST['scurrentyear']) ? $_POST['scurrentyear'] : '';?>" >
  
</td>
<td><label>Semester</label></td>

<td>
  <input class="w3-input w3-border w3-round-large"  type="text" name="scurrentsemester" value="<?php  echo isset($_POST['scurrentsemester']) ? $_POST['scurrentsemester'] : '';?>" >
     </td>
</tr>

      <tr>
        <td><label>Firstname</label></td>
        <td>
          <input required="true"   class="w3-input w3-border w3-round-large" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo isset($_POST['FNAME']) ? $_POST['FNAME'] : ''; ?>">
        </td>
        <td><label>Lastname</label></td>
        <td colspan="1">
          <input required="true"  class="w3-input w3-border w3-round-large" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo isset($_POST['LNAME']) ? $_POST['LNAME'] : ''; ?>">
        </td> 
        <td><label>GF Name</label></td>
        <td>
         
          <input required="true"  class="w3-input w3-border w3-round-large" id="GNAME" name="GNAME" placeholder="Grand Father Name" type="text" value="<?php echo isset($_POST['GNAME']) ? $_POST['GNAME'] : ''; ?>">
        </td> 
        

        </td>
      </tr>
      <tr>
        <td><label>Address</label></td>
        <td colspan="5"  >
        <input required="true"  class="w3-input w3-border w3-round-large" id="PADDRESS" name="address" placeholder="Permanent Address" type="text" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
      </td> 
      </tr>
      <tr>
        <td ><label>Sex </label></td> 
        <td colspan="2">
          <label>
            <input <?php if($_POST['sex']=="F"){echo "Checked";}   ?> id="optionsRadios1" name="sex" type="radio" value="F"  class="w3-radio" >Female 
             <input   <?php if($_POST['sex']=="M"){echo "Checked";}   ?>  id="optionsRadios2" name="sex" type="radio" value="M" class="w3-radio"> Male
          </label>
        </td>
        <td ><label>Date of birth</label></td>
        <td colspan="2"> 
        <div class="input-group" >
                  <div class="input-group-addon"> 
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  required="true" name="BIRTHDATE"  id="BIRTHDATE"  type="Date" class="w3-input w3-border w3-round-large"  placeholder="mm/dd/yyyy"  data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo isset($_POST['BIRTHDATE']) ? $_POST['BIRTHDATE'] : ''; ?>">
           </div>             
        </td>
         
      </tr>
      <tr><td><label>Place of Birth</label></td>
        <td colspan="5">
        <input class="w3-input w3-border w3-round-large" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth (* Optional)" type="text" value="<?php echo isset($_POST['BIRTHPLACE']) ? $_POST['BIRTHPLACE'] : ''; ?>">
         </td>
      </tr>
      <tr>
        <td><label>Nationality</label></td>
        <td colspan="2"><input class="w3-input w3-border w3-round-large" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality (* Optional)" type="text" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
        
      </tr>
      <tr>
      <td><label>Contact No.</label></td>
        <td colspan="2"><input class="w3-input w3-border w3-round-large" id="CONTACT" name="CONTACT" placeholder="Contact Number (* Optional)" type="number" maxlength="11" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
<td><label>Type of Enrollment(Admission)</label></td>
 <td colspan="2">

 <select class="w3-select w3-border w3-round-large" name="admission">
<?php if (isset($_POST['admission']) ){

$_POST['admission']=$_POST['admission'];
 }else{
$_POST['admission']='';


 } ?> 
  <option value="RE" <?php echo $_POST['admission']=="RE"? "selected='true'" : ''; ?> >Regular</option>
  <option value="EX" <?php echo $_POST['admission']=="EX"? "selected='true'" : ''; ?>>Extension</option>
 <option value="WE" <?php echo $_POST['admission']=="WE"? "selected='true'" : ''; ?>>Week end</option>
 <option value="DIS" <?php echo $_POST['admission']=="DIS"? "selected='true'" : ''; ?>>Distance</option>
 
  </select>
              </td>

        
      </tr>
      <tr>
      <td><label>Faculty</label></td>
        <td colspan="1">
          
        <select class="w3-select w3-border w3-round-large" id="authors" name="faculty">
                          <option selected="" disabled="">Select Faculty</option>
                          <?php 
                            require '../include/data.php';
                            $authors = loadAuthors();
                            foreach ($authors as $author) {
                             
                             if($author['facultyname']==$_POST['faculty']){

echo "<option  selected='true' id='".$author['facultyname']."' value='".$author['facultyname']."'>".$author['facultyname']."</option>";

                             }else{
echo "<option  id='".$author['facultyname']."' value='".$author['facultyname']."'>".$author['facultyname']."</option>";
                  

                             }
                              
                             }
                           ?>
                        </select>
        
        </td>
<td><label>Department</label></td>
   <td colspan="1">
          
         <select class="w3-select w3-border w3-round-large" id="books" name="department">
                          
                        </select>
                

        </td>
        <td><label>Civil Status</label></td>
        <td colspan="1">
          <select class="w3-select w3-border w3-round-large" name="CIVILSTATUS">
            <option value="<?php echo isset($_POST['CIVILSTATUS']) ? $_POST['CIVILSTATUS'] : 'Select'; ?>">Select (* Optional)</option>
             <option value="Single">Single</option>
             <option value="Married">Married</option> 
             <option value="Widow">Widow</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Gaurdian</label></td>
        <td colspan="2">
          <input class="w3-input w3-border w3-round-large" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name (*optional)" type="text"value="<?php echo isset($_POST['GUARDIAN']) ? $_POST['GUARDIAN'] : ''; ?>">
        </td>
        <td><label>Contact No.</label></td>
        <td colspan="2"><input  class="w3-input w3-border w3-round-large" id="GCONTACT" name="GCONTACT" placeholder="Contact Number (*optional)" type="text" value="<?php echo isset($_POST['GCONTACT']) ? $_POST['GCONTACT'] : ''; ?>"></td>
      </tr>

<tr>
        <td><label>Applicant's Educational Background</label></td>

<td colspan="5">
1. 12 + 2 Diploma Completed + Level IV COC passed <input type="checkbox" name="D12level4" class="w3-check" <?php if($_POST['D12level4']=='0'){echo "Checked";}   ?> /> 
<br/>
2. 10+ 3 Diploma Completed + Level IV COC passed <input type="checkbox" name="D10level4" class="w3-check" <?php if($_POST['D10level4']=='1'){echo "Checked";}   ?> /> <br/>
3. Preparatory Completed <input type="checkbox" name="priparatory" class="w3-check" <?php if($_POST['priparatory']=='1'){echo "Checked";}   ?> /> <br/>
4. Transfer from other Institution <input type="checkbox" name="transfer" class="w3-check" <?php if($_POST['transfer']=='1'){echo "Checked";}   ?> /> <br/>
5. First Degree Completed <input type="checkbox" name="Degree" class="w3-check" <?php if($_POST['Degree']=='1'){echo "Checked";}   ?>/> <br/>
6. Remark <input type="text" name="remark" class="w3-input w3-border w3-round-large" value="<?php echo isset($_POST['remark']) ? $_POST['remark'] : ''; ?>" /> <br/>



</td>

</tr>
<tr>
<td><label>Cum GPA</label></td>
<td colspan="1"> <input type="text"  value="<?php echo isset($_POST['cgpa']) ? $_POST['cgpa'] : ''; ?>" class="w3-input w3-border w3-round-large" > </input></td>
<td><label>10 <sup>th</sup>  Grade result</label></td>
<td colspan="1"> <input type="text"  name="tenresult" value="<?php echo isset($_POST['tenresult']) ? $_POST['tenresult'] : ''; ?> "    class="w3-input w3-border w3-round-large" > </input></td>
<td><label>12 <sup>th</sup> Grade result</label></td>
<td colspan="1"> <input type="text" value="<?php echo isset($_POST['twelivesthresult']) ? $_POST['twelivesthresult'] : ''; ?>"   name="twelivesthresult" class="w3-input w3-border w3-round-large" > </input></td>

</tr>
      <tr>
      <td colspan="3"> <input type="submit" class="w3-button w3-blue" name="add"  style="width:50%" value="Edit Student" />
         </td>
        <td colspan="3">  
          <input type="submit" class="w3-button w3-red" name="delete"  style="width:50%"  onclick="return confirm('Are you sure you want to Delete Student ?');"   value="Delete Student" />
        
        </td>
      </tr>
    </table>
  </div>
</form>


<?php
    }
} 
else {



 echo '<div class="w3-card-4 w3-amber w3-xlarge">';
echo "NO student with this Id";
echo "</div>";


}






















  ?>








<?php }?>



<?php


if(isset($_POST['delete'])){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmanagment";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlD="Delete from student where sid='".$_POST['STUDID']."'";

if ($conn->query($sqlD) === TRUE) {
echo '<div class="w3-card-4 w3-pale-green w3-large" style="margin-left:20%;"">';

  echo "Student Deleteed  successfully";
  echo "</div>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}


?>


</div>
</div>
</div>