<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];

    $queryDelete = "DELETE FROM users WHERE id = '$deleteId'";
    $sqlDelete = mysqli_query($con, $queryDelete);

    pathTo('register');
  }

?>