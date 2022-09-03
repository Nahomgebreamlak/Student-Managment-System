
<?php require_once("../include/database.php");?>
<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h2></h2>

<form action=""> 



   <select class="w3-select w3-border w3-round-large" name="Faculty" onchange="showCustomer(this.value)">
     
      <?php 

$mydb->setQuery("SELECT * FROM `faculty`");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
  echo '<option value='.$result->facultyname.' >'.$result->facultyname.' </option>';

}
?> 
  </select>
<?php



if(isset($_GET['q'])){
 echo '<select class="w3-select w3-border w3-round-large" name="department">';
                

                $sql = "SELECT * FROM department where facultyname='".$_GET['q']."'";

                           $mydb->setQuery($sql);
                            $cur = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              echo '<option value='.$result->departmentname.' >'.$result->departmentname.' </option>';
                            }
                echo " </select>";  



}
?>






</form>
<br>
<div id="txtHint"></div>

<script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "test.php?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>







