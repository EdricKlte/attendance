<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

$q = $_REQUEST["q"];

$teacher = $_SESSION['name'];


$studentFName= $_SESSION['studentFName'];
$day=$_SESSION['day'];
$month=$_SESSION['month'];
$studentNumber=$_SESSION['studentNumber'];
$sheetID=$_SESSION['sheetID'];

$select = "SELECT * FROM attendance WHERE first_name = '$studentFName' AND day = $day AND month = $month AND students_id = '$studentNumber' AND teacher = '$teacher' AND sheetID = $sheetID";

$sqlselect = mysqli_query($con, $select);
if($row=mysqli_fetch_array($sqlselect)){
	$newID = $row['id'];	
	}

echo $newID;




unset($_SESSION['studentFName']);
unset($_SESSION['day']);
unset($_SESSION['month']);
unset($_SESSION['studentNumber']);

?>