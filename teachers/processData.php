<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

	

	$StudentID = $_GET['id'];
	$ID = $_GET['name'];
	$Status = $_GET['value'];
	$IdArray =(explode("_",$StudentID));

	$sheetID = $IdArray[1];

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