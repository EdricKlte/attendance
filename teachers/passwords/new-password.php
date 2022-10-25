<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  // path
  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/teachers/$destination.php'</script>";
  }

  if (isset($_POST['submitPassword'])) {
    
    $email = trim($_POST['emailAddress']);
    // get the user in database
    $query = "SELECT * FROM users WHERE email = '$email' ";
    $sql = mysqli_query($con, $query);

    if (mysqli_num_rows($sql) == 1) {
      $email = trim($_POST['emailAddress']);
      $newPassword = trim($_POST['newPassword']);
      $confirmPassword = trim($_POST['confirmPassword']);
      
      if ($newPassword === $confirmPassword) {
        $queryUpdatePassword = "UPDATE users SET password = '$confirmPassword' WHERE email = '$email' ";
        $sqlUpdatePassword = mysqli_query($con, $queryUpdatePassword);
  
        pathTo('login');
        
      } else {
        echo "<script>window.alert('Your password does not match')</script>";
      }

    } else {
      echo "<script>window.alert('Email is not exist')</script>";
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NEW PASSWORD</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/new-password.css">

</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <img src="../img/sjc_logo.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
      <div class="header2"></div>
    </div>

    <div class="container">
      <h1>New Password</h1>

      <form action="new-password.php" method="post">
        <input type="email" name="emailAddress" placeholder="Enter Email Address" required>
        <input type="password" name="newPassword" placeholder="Enter New Password" required>
        <input type="password" name="confirmPassword" placeholder="Enter Confirm Password" required>
        <input type="submit" name="submitPassword" value="CONFIRM">
      </form>

    </div>
  </div>
</body>

</html>