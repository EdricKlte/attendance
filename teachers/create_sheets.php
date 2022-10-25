<?php 

require('./php/session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

$month;
$year;
$archive = "no";
$teacher = $_SESSION['name'];
$sections = $_POST['sections'];
$subjects = $_POST['subjects'];
$usersId = $_SESSION['id']; 
	

if(isset($_POST['useDateToday'])){
	$month = date('m');
  	$year = date('Y');
}
else{
	$month = $_POST['month'];
	$year = $_POST['year'];
}


if(!isset($_POST['wholeYear'])){
	$daysCount = cal_days_in_month(CAL_GREGORIAN, $month,$year );
	$sql = "INSERT INTO sheet_record (year, month, days, teacher,sections,subjects,users_id, archive) VALUES ( $year, $month, $daysCount, '".$teacher."','".$sections."','".$subjects."','".$usersId."','".$archive."')";

    if(mysqli_query($con, $sql)){
    	echo "SUCCESS";
    	pathTo('attendance-record');
    }
    else{
    	echo "FAIL";?>
    	<script type="text/javascript">
    		alert("ERROR PLEASE FILL UP");
    	</script>
    	<?php pathTo("attendance-record");
    }
}
else if(isset($_POST['wholeYear'])){
	for($a=1;$a <= 12 ; $a++){
		$month = $a;
		$daysCount = cal_days_in_month(CAL_GREGORIAN, $month,$year );
		$sql = "INSERT INTO sheet_record (year, month, days, teacher,sections,subjects,users_id,archive) VALUES ( $year, $month, $daysCount, '".$teacher."','".$sections."','".$subjects."','".$usersId."','".$archive."')";
		if(mysqli_query($con, $sql)){
			echo "success";
		}
		else{
			echo "fail";
		}
	}pathTo('attendance-record');
}

	?>


