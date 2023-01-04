<?php 
require('session.php');
require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

$firstSem = "";
$secondSem = "";
$data = $_POST;
$year =$_GET['year'];
//$dataCount = count($data);

foreach($data as $DATA){
  $explode = explode(" ",$DATA);

  if($explode[1] == "firstSem"){
    $firstSem = $firstSem ."". $explode[0];
    
  }
  elseif($explode[1] == "secondSem"){
    $secondSem = $secondSem ."". $explode[0];
    
  }
  
  //$schoolYear
} 

if(count($data)>0){
  $addData = "INSERT INTO school_year(academic_year,first_sem,second_sem) VALUES('".$year."','".$firstSem."','".$secondSem."')";
    if(mysqli_query($con, $addData)){
      echo $firstSem;
      echo $secondSem;
      echo "success";
      pathTo('academic-year');
    }
    else{
      echo $firstSem ."<br>";
      echo $secondSem;
      echo "error";
  }
}
else{
  pathTo('academic-year');
}
?>