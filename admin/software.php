<?php 
//Accountiong backload

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
<form action="Software.php" method="post"> 
<div class="w3-container w3-cell">
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




<div class="w3-container w3-cell">
 <select required class="w3-select w3-border w3-round-large" id="books" name="department">
                        <option selected="" disabled="">Select department</option>
                            
                        </select>
</div>




<div class="w3-container w3-cell">
 <select required class="w3-select w3-border w3-round-large"  name="admision">
                        <option value="RE">Regular</option>
                        <option value="EX">Extension</option>
                        <option value="WE">Week End</option>
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





<?php if(isset($_POST['faculty']) && isset($_POST['department']) && isset($_POST['searchinput'])) {
$_SESSION['faculty']=$_POST['faculty'];
$_SESSION['department']=$_POST['department'];
$_SESSION['searchinput']=$_POST['searchinput'];
$_SESSION['admision']=$_POST['admision'];
$_SESSION['section']=$_POST['section'];


 ?>
<div style="float: right; margin-right: 8%;"><input type="button"  onclick="printDiv('printMe')" value="Print Document" class="w3-btn w3-blue w3-large"></div>

<div style="margin-left:25%" id="printMe">



<!DOCTYPE html>
<html>    
<head>
<style>    
body {
  font-family: Arial;
}

.outer-container {
  background: #F0F0F0;
  border: #e0dfdf 1px solid;
  padding: 40px 20px;
  border-radius: 2px;
}

.btn-submit {
  background: #333;
  border: #1d1d1d 1px solid;
    border-radius: 2px;
  color: #f0f0f0;
  cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
  border-collapse: collapse;
  width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
  padding: 8px;
  text-align: left;
}

.tutorial-table td {
    background: #FFF;
  border-bottom: 1px solid #dddddd;
  padding: 8px;
  text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
</head>

<body>
    <h2>Import Software Degree Excel File into Database</h2>
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
$conn = mysqli_connect("localhost","root","","studentmanagment");

    $sqlSelect = "SELECT * FROM student";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Sex</th>
                 <th>SID</th>
            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['Fname']; ?></td>
            <td><?php  echo $row['sex']; ?></td>
            <td><?php  echo $row['sid']; ?></td>
            
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>








































</body>
</html>


</div>
<?php } ?>

<div style="margin-left: 20%">

<?php
//session_start();
$conn = mysqli_connect("localhost","root","","studentmanagment");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        $once=true;
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
          $j=1;
          
            foreach ($Reader as $Row)
            {
        

if($j==1 && $once==true){
$once=False;
 for($jx=4;$jx<=47;$jx++){
//$sid='sid'.$jx;
$y='SUBJECT'.$jx;
$x=isset($Row[$jx])?$Row[$jx]:'';
$_SESSION[$y]=$x;
echo $x;   
echo "<br/>";
 }
}


else{                                    }
                
if ($j>=2) {
    # code...

                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[1]);
               }
                
                $sex = "";
                if(isset($Row[2])) {
                    $sex = mysqli_real_escape_string($conn,$Row[2]);
                }

               $sid = "";
                if(isset($Row[3])) {
                    $sid = mysqli_real_escape_string($conn,$Row[3]);
                }
                
            
                if (!empty($name) || !empty($description)) {

      $sids=$Row[3];
   for($count=4;$count<=40;$count++){

                $grade=$Row[$count];

if($grade==='A+'||$grade==='A'){
$Ngrade = 4;
}
else if($grade==='A-'){

$Ngrade = 3.75;
}


else if($grade=='B+'){
$Ngrade=3.5;
}


else if($grade=='B'){
$Ngrade=3;
}

else if($grade=='B-'){
$Ngrade=2.75;
}


else if($grade=='C+'){
  $Ngrade=2.5;
  }


else if($grade=='C'){
  $Ngrade=2;
  }
else if($grade=='C-'){
  $Ngrade=1.75;
  }
  else if($grade=='D+'||$grade=='D'||$grade=='D-'){
    $Ngrade=1;
    }
else {
$Ngrade = 0;
}





if($_SESSION['admision']=='RE'){


if($count==4 && $count<=8){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='1';
            }



if($count==9 && $count<=14){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='1';
            }


if($count==15 && $count<=19){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='2';
            }

if($count==20 && $count<=25){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='2';
            }

if($count==26 && $count<=31){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='3';
            }



if($count==32 && $count<=36){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='3';
            }




if($count==37 && $count<=41){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='4';
            }



if($count==42 && $count<=47){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='4';
            }









}else {


if($count==4 && $count<=6){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='1';
            }



if($count==7 && $count<=10){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='1';
            }


if($count==11 && $count<=13){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='1';
            }


if($count==14 && $count<=17){
$_SESSION['Semester']='First';
                $_SESSION['yearofstudy']='2';
            }
if($count==18 && $count<=21){
$_SESSION['Semester']='Second';
                $_SESSION['yearofstudy']='2';
            }

if($count==22 && $count<=25){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='2';
            }

if($count==26 && $count<=29){
$_SESSION['Semester']='First';
                $_SESSION['yearofstudy']='3';
            }

if($count==30 && $count<=33){
$_SESSION['Semester']='Second';
                $_SESSION['yearofstudy']='3';
            }

if($count==34 && $count<=36){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='3';
            }



if($count==37 && $count<=39){
$_SESSION['Semester']='First';
                $_SESSION['yearofstudy']='4';
            }

if($count==40 && $count<=43){
$_SESSION['Semester']='Second';
                $_SESSION['yearofstudy']='4';
            }

if($count==44 && $count<=47){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='4';
            }










}






               $nsid=$sid;
                
         //  echo $sid;

               $_SESSION['year']=$_SESSION['searchinput'];
                $x='SUBJECT'.$count;
                $_SESSION['coursecode']=$_SESSION[$x];


                if($grade!=''){

$sqltest = "SELECT sid FROM Grade where courseid='".$_SESSION['coursecode']."' and sid='".$nsid."'";

 $resultss = mysqli_query($conn, $sqltest);

if (mysqli_num_rows($resultss) > 0)
{
echo "Already Inserted";

}else{
$sql="Insert into grade(sid,Agrade,Ngrade,courseid,Acyear,semester,classyear) values ('".$nsid."','".$grade."','".$Ngrade."','". $_SESSION['coursecode']."','".$_SESSION['year']."','".$_SESSION['Semester']."','".$_SESSION['yearofstudy']."')";
                //   echo $sql;
                    $result = mysqli_query($conn, $sql);
}

                }






}


$dep=$_SESSION['department'];
   $faculty=$_SESSION['faculty'];
  $admision= $_SESSION['admision'];
  $yearofstudy= $_SESSION['searchinput'];
$section=$_SESSION['section'];

$sqltestf = "SELECT sid FROM student where sid='".$nsid."'";

 $resultssf = mysqli_query($conn, $sqltestf);

if (mysqli_num_rows($resultssf) > 0)
{
echo "Already Inserted";
}
else{

                    $query = "insert into student(Fname,sex,sid,department,Faculty,Typeofenrollment,year,section) values('".$name."','".$sex."','".$sid."','".$dep."','".$faculty."','".$admision."','".$yearofstudy."','".$section."')";
                    $result = mysqli_query($conn, $query);
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel ";
                    }

}

}

             





}
else{


}
$j++;
   }//for loop......
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
</div>