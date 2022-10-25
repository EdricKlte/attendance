<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];

    $queryDeleteSubject = "DELETE FROM add_subject WHERE subject_id = '$deleteId'";
    $sqlDeleteSubject = mysqli_query($con, $queryDeleteSubject);

    pathTo('add-subject');
  } else {
    pathTo('add-subject');
  }
 
?>