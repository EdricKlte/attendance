<?php

require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
require('./php/session.php');

//$id = $_GET['ID'];

$ID = $_POST;
$idCount = count($ID);


foreach($ID as $id){
	if(isset($_POST['Delete'])){
		$deleteData = "DELETE FROM sheet_record WHERE id = $id";
		$deleteData1 = "SELECT * FROM attendance WHERE sheetID = $id";
		
		$sqlSheetRecord = mysqli_query($con, $deleteData1);
		
		while($row = mysqli_fetch_array($sqlSheetRecord)){
			echo $row['id'];
			$attendanceID = $row['id'];
			$deleteData2 = "DELETE FROM attendance WHERE id = $attendanceID ";
			if(mysqli_query($con, $deleteData2)){
				
			}
		}

		if(mysqli_query($con, $deleteData)){
			echo " SUCCESS ";
			pathTo("attendance-record");
		}
		else{ 	

			pathTo("attendance-record");
		}
	}





	elseif(isset($_POST['Archive'])){
		$changeArchive = "UPDATE sheet_record SET Archive='yes' WHERE id = $id ";
		if(mysqli_query($con, $changeArchive)){
			echo " SUCCESS";
			pathTo("attendance-record");
			}
		else{
			pathTo("attendance-record");
		}
	}

	elseif(isset($_POST['Archive2'])){
		$changeArchive = "UPDATE sheet_record SET Archive='no' WHERE id = $id ";
		if(mysqli_query($con, $changeArchive)){
			echo " SUCCESS";
			pathTo("attendance-record");
			}
		else{
			pathTo("attendance-record");
		}
	}
	elseif(isset($_POST['openArchive'])){
		$_SESSION['archive']="yes";
		pathTo("attendance-record");
	}
	elseif(isset($_POST['CloseArchive'])){
		$_SESSION['archive']="no";
		pathTo("attendance-record");
	}




}//pathTo('attendance-record');


/*echo $id;
$deleteData = "DELETE FROM sheet_record WHERE id = $id";
if(mysqli_query($con, $deleteData)){
	echo "SUCCESS";
	pathTo("attendance-record");
}*/



?>


