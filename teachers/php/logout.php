<?php
  session_start();

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/$destination.php'</script>";
  }

  $_SESSION['teacher-status'] = 'invalid';

  unset($_SESSION['id']);
  
  pathTo('index');
?>