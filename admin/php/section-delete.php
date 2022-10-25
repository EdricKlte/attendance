<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  
  if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];

    $queryDelete = "DELETE FROM add_section WHERE section_id = '$deleteId'";
    $sqlDelete = mysqli_query($con, $queryDelete);

    echo '<script>window.location.href = "/attendance/admin/add-section.php"</script>';
    
  } else {
    
    echo '<script>window.location.href = "/attendance/admin/add-section.php"</script>';
    
  }

?>