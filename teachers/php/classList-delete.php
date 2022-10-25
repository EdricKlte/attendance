<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
  }
  
  if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];

    $queryDelete = "DELETE FROM class_list WHERE id = '$deleteId'";
    $sqlDelete = mysqli_query($con, $queryDelete);

    pathTo('class-list');
  } else {
    pathTo('class-list');
  }


?>