<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

$id = $_GET['name'];



$selectData = "SELECT * FROM attendance WHERE id = $id";
$sqlData=mysqli_query($con, $selectData);
if($row=mysqli_fetch_array($sqlData)){


	$_SESSION['getStudentId']=$row['students_id'];
	$_SESSION['getMonth']=$row['month'];
	$_SESSION['getDay']=$row['day'];
	$_SESSION['getSheedID']=$row['sheetID'];


	$studentID=$_SESSION['getStudentId'];
	$month=$_SESSION['getMonth'];
	$day=$_SESSION['getDay'];
	$sheetID=$_SESSION['getSheedID'];
	
	echo $studentID."_".$month."_".$day."_".$sheetID;
}


$deleteData = "DELETE FROM attendance WHERE id = $id";
mysqli_query($con, $deleteData);

?>