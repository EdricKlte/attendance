<?php
  session_start();

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
  }

  if ($_SESSION['teacher-status'] == 'invalid' || empty($_SESSION['teacher-status'])) {
    
    $_SESSION['teacher-status'] = 'invalid';

    unset($_SESSION['id']);

    pathTo('login');
  }

?>