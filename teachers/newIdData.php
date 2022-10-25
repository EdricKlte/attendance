<?php
require('./php/session.php');
$a = $_REQUEST['a'];

$studentID=$_SESSION['getStudentId'];
$month=$_SESSION['getMonth'];
$day=$_SESSION['getDay'];
$sheetID=$_SESSION['getSheedID'];


echo $studentID."_".$month."_".$day."_".$sheetID;

?>