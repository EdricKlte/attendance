<?php
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

$studentFName = $_GET['name'];
$day = $_GET['value'];
$ID = $_GET['id'];
$teacher = $_SESSION['name'];
$IdArray =(explode("_",$ID));//STUDENT NUMBER AND MONTH

echo $ID;
$subjects =$_SESSION['subjects'];
$sections =$_SESSION['sections'] ;
$usersId =$_SESSION['id'] ;

$studentNumber = $IdArray[0];
$month = $IdArray[1];
$sheetID = $IdArray[3];

$addStatus = "INSERT INTO attendance (students_id,first_name,day,Status,teacher,month,sheetID,subjects,sections,users_id) VALUES ('".$studentNumber."','".$studentFName."','$day','1','".$teacher."','".$month."','".$sheetID."','".$subjects."','".$sections."','".$usersId."')";

if(mysqli_query($con, $addStatus)){
	echo "SUCCESS";
	$_SESSION['studentFName']=$studentFName;
	$_SESSION['day']=$day;
	$_SESSION['month']=$month;
	$_SESSION['studentNumber']=$studentNumber;
	$_SESSION['sheetID']=$sheetID;
}

?>		


