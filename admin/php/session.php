<?php
  session_start();

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    
      $_SESSION['status'] = 'invalid';

      unset($_SESSION['username']);

      pathTo('login');
  }

?>