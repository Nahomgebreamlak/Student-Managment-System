


<div class="w3-panel w3-blue w3-round" style="margin-left:20%">
  <p> SanDaro College</p>
<div class="w3-cell-row">
<form class="w3-container w3-card-4" action="add.php" method="post">
  <div class="w3-container w3-cell">
   <select class="w3-select w3-border w3-round-large" name="year">
    <option value="" disabled selected>year</option>
    <?php 

$mydb->setQuery("SELECT * FROM `year`");
$cur = $mydb->loadResultList();

foreach ($cur as $result) {
  echo '<option value='.$result->year.'>'.$result->year.'</option>';

}?>
  </select>
  </div>

  <div class="w3-container  w3-cell">
     <select class="w3-select w3-border w3-round-large" name="semester">
    <option value="" disabled selected>Semester</option>
    <option value="First">First</option>
    <option value="Second">Second</option>
    <option value="Summer">Summer</option>
  </select>
  </div>
  <div class="w3-container  w3-cell">
     <select class="w3-select w3-border w3-round-large" name="faculty">
    <option value="" disabled selected>Faculty</option>
    <?php 

                            $mydb->setQuery("SELECT * FROM `faculty`");
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              echo '<option value='.$result->facultyname.' >'.$result->facultyname.' </option>';

                            }
                          ?> 
  
  
  </select>
  </div>
  <div class="w3-container w3-cell">
     <select class="w3-select w3-border w3-round-large" name="department">
    <option value="" disabled selected>Department</option>
    <?php 
                           $mydb->setQuery("SELECT * FROM `department`");
                            $cur = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              echo '<option value='.$result->departmentname.' >'.$result->departmentname.' </option>';
                            }
                          ?>
  </select>
  </div>
 
 
  <div class="w3-container w3-cell">
     <select class="w3-select w3-border w3-round-large" name="course">
    <option value="" disabled selected>Course</option>
    <?php 
                           $mydb->setQuery("SELECT * FROM `course`");
                            $cur = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              echo '<option value='.$result->ccode.' >'.$result->cname.' </option>';
                            }
                          ?>
  </select>
  </div>
 
 
 
 
 
  <div class="w3-container  w3-cell">
     <select class="w3-select w3-border w3-round-large" name="yearofstudy">
    <option value="" disabled selected>Year of Studey</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
 
  </select>
  </div>


  <div class="w3-container w3-cell">
  <input type="text"  name="searchinput" class="w3-input w3-border w3-round" /> </input>
  </div>
  <div class="w3-container w3-cell" > 

<input type="submit" name="search" value="search" class="w3-button w3-border "></input>
  </div>
</form>
</div>

</div>






