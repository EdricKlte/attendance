<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if (isset($_POST['add'])) {
    $department = $_POST['department'];
    $course = $_POST['course'];
    $yearLevel = $_POST['year-level'];
    $addSection = trim($_POST['add-section']);

    $querySection = "INSERT INTO add_section VALUES( null, '$department', '$course', '$addSection', '$yearLevel' )";
    $sqlSection = mysqli_query($con, $querySection);
    
    pathTo('add-section');
  }
  else{
    echo "ERROR";
  }


?>