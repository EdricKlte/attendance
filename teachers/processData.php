<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

	

	$StudentID = $_GET['id']; //STUDENT NUMBER
	$ID = $_GET['name']; //DAY
	$Status = $_GET['value'];//PRESENT OR ABSENT
	$IdArray =(explode("_",$StudentID));

	$sheetID = $IdArray[2];

	if (strcmp($Status, "P") == 0){
		$newStatus = "UPDATE attendance SET Status=0 WHERE id=$ID";
		if(mysqli_query($con, $newStatus)){
  			echo "SUCCESS";
  		}
		else{
			echo "ERROR";
		}
	}
	else if (strcmp($Status, "A") == 0){
		$newStatus = "UPDATE attendance SET Status=1 WHERE id=$ID";
		if(mysqli_query($con, $newStatus)){
  			echo "SUCCESS";
  		}
  		else{
  			echo "ERROR";
  		}
  		?>

  		<?php
	}

  ?>