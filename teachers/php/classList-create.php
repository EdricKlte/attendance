<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  
  session_start();
  
  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
  }

  if (isset($_POST['create'])) {
    $id = $_SESSION['id'];
    $lastName = trim($_POST['lastName']);
    $firstName = trim($_POST['firstName']);
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $studentNumber =$_POST['studentNumber'];

    $queryClass = "INSERT INTO class_list VALUES (null, '$id', '$lastName', '$firstName', '$course', '$section', '$subject', '$studentNumber')";
    $sqlClass = mysqli_query($con, $queryClass);
    
    pathTo('class-list');
  }
?>