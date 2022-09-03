<?php
$mysqli = new mysqli("localhost", "root", "", "studentmanagment");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$_POST['searchvalue']='SDC/com/RE/20/19';

$sql='select dropedcourse.Coursecode , course.ccode ,course.cname , course.semester ,course.tyear from dropedcourse INNER JOIN course  ON course.ccode= dropedcourse.Coursecode where sid="'.$_POST['searchvalue'].'";';

$sql.="select grade.courseid, course.ccode ,course.cname , course.semester ,course.tyear from grade   INNER JOIN course  ON course.ccode= grade.Courseid  where sid='".$_POST['searchvalue']."' and (Agrade='F' or Agrade='I' or Agrade='NG')";

/* execute multi query */
if ($mysqli->multi_query($sql)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}

/* close connection */
$mysqli->close();
?>
