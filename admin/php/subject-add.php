<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if (isset($_POST['addSubject'])) {
    $subject = trim($_POST['subject']);
    $year = $_POST['year'];
    $course = $_POST['course'];

    $querySubject = "INSERT INTO add_subject VALUES (null, '$subject', '$year', '$course')";
    $sqlSubject = mysqli_query($con, $querySubject);
    pathTo('add-subject');

  } else {
    pathTo('add-subject');
  }

?>