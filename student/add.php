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
<div style="margin-left:25%">

<form action="add.php" class="w3-container" method="post" >
  <div >
  <div class="w3-panel">
  <h1 class="w3-text-blue" style="text-shadow:1px 1px 0 #444">
  <b>Add New Student</b></h1>
</div>
  <label >Academic Year: <b style="color:red">*</b></label>
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
        <td><label>Firstname<b style="color:red">*</b> </label></td>
        <td>
          <input required="true"   class="w3-input w3-border w3-round-large" id="FNAME" name="FNAME" placeholder="First Name" type="text" value="<?php echo isset($_POST['FNAME']) ? $_POST['FNAME'] : ''; ?>">
        </td>
        <td><label>Lastname <b style="color:red">*</b> </label></td>
        <td colspan="1">
          <input required="true"  class="w3-input w3-border w3-round-large" id="LNAME" name="LNAME" placeholder="Last Name" type="text" value="<?php echo isset($_POST['LNAME']) ? $_POST['LNAME'] : ''; ?>">
        </td> 
        <td><label>GF Name <b style="color:red">*</b> </label></td>
        <td>
         
          <input required="true"  class="w3-input w3-border w3-round-large" id="LNAME" name="GNAME" placeholder="Grand Father Name" type="text" value="<?php echo isset($_POST['LNAME']) ? $_POST['LNAME'] : ''; ?>">
        </td> 
        

        </td>
      </tr>
      <tr>
        <td><label>Address <b style="color:red">*</b> </label></td>
        <td colspan="5"  >
        <input required="true"  class="w3-input w3-border w3-round-large" id="PADDRESS" name="address" placeholder="Permanent Address" type="text" value="<?php echo isset($_POST['PADDRESS']) ? $_POST['PADDRESS'] : ''; ?>">
        </td> 
      </tr>
      <tr>
        <td ><label>Sex </label></td> 
        <td colspan="2">
          <label>
            <input checked id="optionsRadios1" name="sex" type="radio" value="F"  class="w3-radio" >Female 
             <input id="optionsRadios2" name="sex" type="radio" value="M" class="w3-radio"> Male
          </label>
        </td>
        <td ><label>Date of birth <b style="color:red">*</b> </label></td>
        <td colspan="2"> 
        <div class="input-group" >
                  <div class="input-group-addon"> 
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  required="true" name="BIRTHDATE"  id="BIRTHDATE"  type="Date" class="w3-input w3-border w3-round-large"  value="<?php echo isset($_POST['BIRTHDATE']) ? $_POST['BIRTHDATE'] : ''; ?>">
           </div>             
        </td>
         
      </tr>
      <tr><td><label>Place of Birth</label></td>
        <td colspan="5">
        <input class="w3-input w3-border w3-round-large" id="BIRTHPLACE" name="BIRTHPLACE" placeholder="Place of Birth (* Optional)" type="text" value="<?php echo isset($_POST['BIRTHPLACE']) ? $_POST['BIRTHPLACE'] : ''; ?>">
         </td>
      </tr>
      <tr>
        <td><label>Nationality <b style="color:red">*</b> </label></td>
        <td colspan="2"><input required="true" class="w3-input w3-border w3-round-large" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality" type="text" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
        
      </tr>
      <tr>
      <td><label>Contact No. <b style="color:red">*</b> </label></td>
        <td colspan="2"><input class="w3-input w3-border w3-round-large" id="CONTACT" name="CONTACT" placeholder="Contact Number" required="true" type="number" maxlength="11" value="<?php echo isset($_POST['CONTACT']) ? $_POST['CONTACT'] : ''; ?>">
              </td>
<td><label>Admission Type <b style="color:red">*</b> </label></td>
 <td colspan="2">

 <select class="w3-select w3-border w3-round-large" name="admission" required="true">
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
      <td><label>Faculty <b style="color:red">*</b> </label></td>
        <td colspan="1">
          
        <select class="w3-select w3-border w3-round-large" id="authors" name="faculty"  required="true">
                          <option selected="" disabled="">Select Faculty</option>
                          <?php 
                            require '../include/data.php';
                            $authors = loadAuthors();
                            foreach ($authors as $author) {
                              echo "<option id='".$author['facultyname']."' value='".$author['facultyname']."'>".$author['facultyname']."</option>";
                  }
                           ?>
                        </select>
        
        </td>
<td><label>Department  <b style="color:red">*</b> </label></td>
   <td colspan="1">
          
         <select class="w3-select w3-border w3-round-large" id="books" name="department" required="true">
                          
                        </select>
                

        </td>
        <td><label>Civil Status</label></td>
        <td colspan="1">
          <select class="w3-select w3-border w3-round-large" name="CIVILSTATUS"  required="true">
            <option value="<?php echo isset($_POST['CIVILSTATUS']) ? $_POST['CIVILSTATUS'] : 'Select'; ?>">Select(*Optional)</option>
             <option value="Single">Single</option>
             <option value="Married">Married</option> 
             <option value="Widow">Widow</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label>Gaurdian</label></td>
        <td colspan="2">
          <input class="w3-input w3-border w3-round-large" id="GUARDIAN" name="GUARDIAN" placeholder="Guardian Name (*optional)" type="text"value="<?php echo isset($_POST['GUARDIAN']) ? $_POST['GUARDIAN'] : ''; ?>">
        </td>
        <td><label>Contact No.</label></td>
        <td colspan="2"><input  class="w3-input w3-border w3-round-large" id="GCONTACT" name="GCONTACT" placeholder="Contact Number (*optional)" type="number" value="<?php echo isset($_POST['GCONTACT']) ? $_POST['GCONTACT'] : ''; ?>"></td>
      </tr>

<tr>
        <td><label>Applicant's Educational Background <b style="color:red">*</b> </label></td>

<td colspan="5">
1. 12 + 2 Diploma Completed + Level IV COC passed <input checked type="checkbox" name="D12level4" class="w3-check" /> <br/>
2. 10+ 3 Diploma Completed + Level IV COC passed <input type="checkbox" name="D10level4" class="w3-check"  /> <br/>
3. Preparatory Completed <input type="checkbox" name="priparatory" class="w3-check"  /> <br/>
4. Transfer from other Institution <input type="checkbox" name="transfer" class="w3-check" /> <br/>
5. First Degree Completed <input type="checkbox" name="Degree" class="w3-check" /> <br/>
6. Remark <input type="text" name="remark" class="w3-input w3-border w3-round-large" /> <br/>

</td>

</tr>
<tr>
<td><label>Cum GPA</label></td>
<td colspan="1"> <input type="text" value="" name="cgpa" class="w3-input w3-border w3-round-large" > </input></td>
<td><label>10 <sup>th</sup>  Grade result</label></td>
<td colspan="1"> <input type="text" value="" name="tenresult" class="w3-input w3-border w3-round-large" > </input></td>
<td><label>12 <sup>th</sup> Grade result</label></td>
<td colspan="1"> <input type="text" value="" name="twelivesthresult" class="w3-input w3-border w3-round-large" > </input></td>

</tr>
      <tr>
      <td></td>
        <td colspan="5">  
          <input type="submit" class="w3-button w3-blue" name="add"  style="width:50%" value="Insert Student" />
        </td>
      </tr>
    </table>
  </div>
</form>






<?php
        if(isset($_POST['add'])){
//echo "test";

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
$section=isset($_POST['section'])?$_POST['section']:" ";
$remark=isset($_POST['remark'])?$_POST['remark']:" ";


$sql = "SELECT max(id) FROM student where department='".$department."' and year='".$ayear."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
     //   echo "id: " . $row["0"]. "<br>";
   
   $lastid= $row["0"];
    }
} else {
    echo "0 results";
}

$last= (int)$lastid + 1;
$SYEAR=substr($ayear, 2);
$depid=substr($department, 0,3);
$sid= "SDC/".$depid."/".$addmission."/".$last."/".$SYEAR;
echo '<script>alert("Your Registration successfull and your student id is  "+"'.$sid.'")</script>';






$sql2="INSERT INTO student
(year,sid, Fname,
lname,gname,address, 
dbdate, placeofbirth, Nationality,
contactno,typeofenrollment,faculty,
department,civilstatus,gradianname,
gardiancontact,req1,req2
,req3,req4,req5,
tenthgraderesult,twelivethgraderesult,cgpa,
sex,scurrentyear,scurrentsemester,section,remark) 
VALUES ('".$ayear."','".$sid."','".$fname."',
'".$lname."','".$gname."','".$address."','".$dbirth."','".$birthplace."','".$nationality."',
'".$contact."','".$addmission."','".$faculty."',
'".$department."','".$civilstatu."','".$gardianname."',
'".$Gcontact."','".$req1."','".$req2."',
'".$req3."','".$req4."','".$req5."',
'".$teng."','".$twelevegrade."','".$cgpa."',
'".$sex."',1,'First','".$section."','".$remark."')" ;
if ($conn->query($sql2) === TRUE) {
echo '<div class="w3-card-4 w3-green">';
echo "New record created successfully";
echo "</div>";
} 
else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
        }
?>











</div>

</div>