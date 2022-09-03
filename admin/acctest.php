<?php
session_start();
$conn = mysqli_connect("localhost","root","","studentmanagment");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
   echo  $_POST['test'];
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
 for($jx=4;$jx<=40;$jx++){
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
   for($count=4;$count<41;$count++){

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


if($count==4 && $count<=7){
$_SESSION['Semester']='First';
 $_SESSION['yearofstudy']='1';
            }



if($count==8 && $count<=11){
$_SESSION['Semester']='Second';
$_SESSION['yearofstudy']='1';
            }


if($count==12 && $count<=15){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='1';
            }


if($count==16 && $count<=19){
$_SESSION['Semester']='First';
                $_SESSION['yearofstudy']='2';
            }
if($count==20 && $count<=23){
$_SESSION['Semester']='Second';
                $_SESSION['yearofstudy']='2';
            }

if($count==24 && $count<=27){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='2';
            }

if($count==28 && $count<=31){
$_SESSION['Semester']='First';
                $_SESSION['yearofstudy']='3';
            }

if($count==32 && $count<=36){
$_SESSION['Semester']='Second';
                $_SESSION['yearofstudy']='3';
            }

if($count==37 && $count<=40){
$_SESSION['Semester']='Summer';
                $_SESSION['yearofstudy']='3';
            }


               $nsid=$sid;
                
         //  echo $sid;

                $_SESSION['year']='2019';
                $x='SUBJECT'.$count;
                $_SESSION['coursecode']=$_SESSION[$x];


                if($grade!=''){
  $sql="Insert into grade(sid,Agrade,Ngrade,courseid,Acyear,semester,classyear) values ('".$nsid."','".$grade."','".$Ngrade."','". $_SESSION['coursecode']."','".$_SESSION['year']."','".$_SESSION['Semester']."','".$_SESSION['yearofstudy']."')";

  //echo $sql;
                   // $result = mysqli_query($conn, $sql);
                }







}




                    //$query = "insert into student(Fname,sex,sid) values('".$name."','".$sex."','".$sid."')";
                    //$result = mysqli_query($conn, $query);
                    //if (! empty($result)) {
                      //  $type = "success";
                       // $message = "Excel Data Imported into the Database";
                    //} else {
                      // $type = "error";
                      // $message = "Problem in Importing Excel ";
                   //}



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
    <h2>Import Excel File into Database</h2>
    
    <div class="outer-container">
        <form action="acctest.php" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            

<input type="text" name="test"/>
            <div>
                <label>Choose Excel
                    File</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                  <input type="text" name="test"/>

                <input type="submit" name="import" class="btn-submit" id="submit"> 
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
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


