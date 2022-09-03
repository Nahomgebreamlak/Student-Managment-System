<?php 
session_start();
if(!isset($_SESSION['loginuser']))
{
header("location:../index.php");
}
else{

 $_SESSION['role']=$_SESSION['role']; 
}
?>
<?php
include("../include/header.php");
?>
<?php
include("../include/sidenav.php");
?>
<?php
//include("../include/navigation.php");
include("../include/footer.php");
?>

<?php



backup_tables('localhost','root',"",'studentmanagment');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   
   $link = mysql_connect($host,$user,$pass);
   mysql_select_db($name,$link);
   $return='';
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
      for ($i = 0; $i < $num_fields; $i++) 
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j < $num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j < ($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   

echo '<div class="w3-card-4 w3-pale-green w3-xxlarge" style="margin-left:20%;">';
echo "Backup created successfully";
echo "</div>";

   //save file
   $handle = fopen('D:/Databasebackup/'.date('d-M-Y').'-'.(md5(implode(',',$tables))).'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);



}
?>