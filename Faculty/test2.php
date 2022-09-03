<?php require_once("../include/database.php");?>
<select class="w3-select w3-border w3-round-large" name="Faculty" onchange="showCustomer(this.value)">
     
      <?php 

$mydb->setQuery("SELECT * FROM `faculty`");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
  echo '<option value='.$result->facultyname.' >'.$result->facultyname.' </option>';

}
?> 
  </select>

<div id="dep">

<?php


echo '<select class="w3-select w3-border w3-round-large" name="department">';
 
if(isset($_GET['q'])){
                

                $sql = "SELECT * FROM department where facultyname='".$_GET['q']."'";

                           $mydb->setQuery($sql);
                            $cur = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              echo '<option value='.$result->departmentname.' >'.$result->departmentname.' </option>';
                            }
 

}
 echo " </select>";  

?>
              

</div>

	



<script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("dep").innerHTML = "";
   //  document.getElementById("dep").style.display="none";
     
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
//      document.getElementById("dep").style.display="block";
     document.getElementById("dep").innerHTML = this.responseText;







    }
  };
  xhttp.open("GET", "test2.php?q="+str, true);
  xhttp.send();
}
</script>
