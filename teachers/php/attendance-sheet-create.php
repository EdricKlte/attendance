<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
 
  session_start();

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
  }

  if (isset($_POST['submit'])) {
    
    $usersId = $_SESSION['id'];
    
    $query = "SELECT * FROM class_list";
    $sql = mysqli_query($con, $query);
    $result = mysqli_fetch_array($sql);

    $studentId = $result['id'];

    if (mysqli_num_rows($sql) > 0) {
      $attendance = $_POST['attendance']; 
      $queryAttendance = "INSERT INTO attendance VALUES (null, '$usersId', '$studentId' ,'$attendance', curdate())";
      $sqlAttendance = mysqli_query($con, $queryAttendance);

      pathTo('attendance-sheet');
    }
  }

?>