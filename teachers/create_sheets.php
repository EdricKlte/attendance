<?php 

require('./php/session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

//$month;
//$year;
$archive = "no";
$teacher = $_SESSION['name'];
$sections = $_POST['sections'];
$subjects = $_POST['subjects'];
$academic_year = $_POST['academic_year'];
$usersId = $_SESSION['id']; 

	

echo $academic_year;
$query = "SELECT * FROM school_year WHERE id = '$academic_year'";
$sql = mysqli_query($con,$query);
if($row = mysqli_fetch_array($sql)){
	$school_year = $row['academic_year'];
	$first_sem1 = "first_sem";
	$second_sem1 = "second_sem";
	$first_SEM = explode(",",$row['first_sem']);
	$second_SEM = explode(",",$row['second_sem']);
	print_r($first_SEM);

	foreach($first_SEM as $first_sem){
		if(!empty($first_sem)){
			$explode = explode("-",$first_sem);
			
			$daysCount = cal_days_in_month(CAL_GREGORIAN, $explode[0],$explode[1] );
			$sql = "INSERT INTO sheet_record (year, month, days, teacher,sections,subjects,users_id,archive,school_year,semester) VALUES ( $explode[1], $explode[0], $daysCount, '".$teacher."','".$sections."','".$subjects."','".$usersId."','".$archive."','".$school_year."','".$first_sem1."')";
			if(mysqli_query($con, $sql)){
				echo "SUCCESS";
			}
		}
	}

	foreach($second_SEM as $second_sem){
		if(!empty($second_sem)){
			$explode = explode("-",$second_sem);
			
			$daysCount = cal_days_in_month(CAL_GREGORIAN, $explode[0],$explode[1] );
			$sql = "INSERT INTO sheet_record (year, month, days, teacher,sections,subjects,users_id,archive,school_year,semester) VALUES ( $explode[1], $explode[0], $daysCount, '".$teacher."','".$sections."','".$subjects."','".$usersId."','".$archive."','".$school_year."','".$second_sem1."')";
			if(mysqli_query($con, $sql)){
				//echo "SUCCESS";
			}
		}
	}
pathTo('attendance-record');


}
else{
	echo "ERRoR";
}




























/*
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
    	//echo "SUCCESS";
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
}*/

	?>


