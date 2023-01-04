<?php 
require('./php/session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

$usersId = $_SESSION['id']; 
$query = "SELECT * FROM assign WHERE teachers = '$usersId' ";
$sql = mysqli_query($con, $query);


$teacher = $_SESSION['name'];
$sections = $_SESSION['sections'];
$subjects = $_SESSION['subjects'];

function filterData(&$str){
	$str = preg_replace("/\t/","\\t",$str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str,'"'))$str = '"'. str_replace('"','""',$str) . '"';
}



$fields = array('Student No.','Student','Present','Absent');

$excelData = implode("\t", array_values($fields)) . "\n";



$semester = $_GET['ID'];
$querySheetRecord = "SELECT * FROM sheet_record WHERE sections = '$sections' AND subjects = '$subjects' AND users_id = '$usersId' AND semester = '$semester' ";
$sqlSheetRecord = mysqli_query($con, $querySheetRecord);
while($sheetRecord = mysqli_fetch_array($sqlSheetRecord)){
	$daysCount = $sheetRecord['days'];
    $year = $sheetRecord['year'];
    $month = $sheetRecord['month'];
    $sheetID = $sheetRecord['id'];
    $fileName = $subjects."/".$sections."/".$month."/".$year.".xls";

    //PER Months
    switch($month){
    		case 1 : 
                $month1 = "January";
                break;
                case 2 : 
                $month1 = "February";
                break;
                case 3 : 
                $month1 = "March";
                break;
                case 4 : 
                $month1 = "April";
                break;
                case 5 : 
                $month1 = "May";
                break;
                case 6 : 
                $month1 = "June";
                break;
                case 7 : 
                $month1 = "July";
                break;
                case 8 : 
                $month1 = "August";
                break;
                case 9 : 
                $month1 = "September";
                break;
                case 10 : 
                $month1 = "October";
                break;
                case 11 : 
                $month1 = "November";
                break;
                case 12 : 
                $month1 = "December";
                break;
                default:
                $month1 = "erroR";
    	}
    $context = "Summary of Attendance in the Month of ". $month1." ".$year;
	$fields = array($context);
	$excelData .= implode("\t", array_values($fields)) . "\n";


$queryClassList = "SELECT * FROM class_list WHERE users_id = '$usersId' AND section = '$sections' AND subject = '$subjects' order by last_name ";

$sqlClassList = mysqli_query($con, $queryClassList);


while($classListResult = mysqli_fetch_array($sqlClassList)) {
	$studentID = $classListResult['students_id'];
    $studentFn = $classListResult['first_name'];
    $studentLn = $classListResult['last_name'];
    $studentNumber = $classListResult['students_id'];
    $section1 = $classListResult['section'];
    $subject1 = $classListResult['subject']; 
    
    //array_walk($lineData, 'filterData');
    //$excelData .= implode("\t", array_values($lineData)) . "\n";
    $present = 0;
    $absent = 0;
    for($a=1;$a<=$daysCount;$a++){
		$select = "SELECT * FROM attendance WHERE sections = '$section1' AND subjects='$subject1' AND students_id = '$studentID' AND day = $a AND month = $month AND sheetID = $sheetID  ";
		$sqlselect = mysqli_query($con, $select);
		if($row=mysqli_fetch_array($sqlselect)){
			if($classListResult['students_id']==$row['students_id']){
				if($row['Status']==1 && $row['day']==$a ){
					$present = $present + 1;
				}
				else if($row['Status']==0 && $row['day']==$a){
					$absent = $absent +1;
				}

			}
		}
    }

    
    $lineData = array($studentNumber,$studentLn." ".$studentFn,$present,$absent);
    array_walk($lineData, 'filterData');
    $excelData .= implode("\t", array_values($lineData))."\n";

}


}



header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 


echo $excelData;

exit;


?>