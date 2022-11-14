<?php 
  require('./php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  if (isset($_POST['changePassword'])) {
    
    $oldPassword = trim($_POST['oldPassword']);
    $userId = $_SESSION['id'];

    $queryChangePassword = " SELECT * FROM users WHERE id = '$userId' ";
    $sqlChangePassword = mysqli_query($con, $queryChangePassword);
    $results = mysqli_fetch_array($sqlChangePassword);

    if ($oldPassword == $results['password']) {
      $newPassword = trim($_POST['newPassword']);
      $passwordEncrypt = md5($newPassword);

      $queryUpdatePassword = "UPDATE users SET password = '$passwordEncrypt' WHERE id = '$userId' ";
      $sqlUpdatePassword = mysqli_query($con, $queryUpdatePassword);

      echo "<script>window.alert('Your password has successfully changed')</script>";
      unset($_SESSION['teacher-status']);
      echo "<script>window.location.href = '/attendance/teachers/login.php'</script>";
    } else {
      echo "<script>window.alert('Wrong Old Password')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHANGE PASSWORD</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/change-password.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="./js/sidebar.js" defer></script>

</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc-bg-color.png" alt="Saint Jude College" />
      <div class="header2"></div>
    </div>

    <!-- sidebar -->
    <div class="sidebar close">
      <ul class="menu-container">
        <i class="fa-solid fa-xmark" id="close"></i>

        <a href="#">
          <li>Welcome: <?php echo $_SESSION['name'] ?></li>
        </a>
        <a href="class-list.php">
          <li>Class List</li>
        </a>
        <a href="listofclass.php">
          <li>List of Class</li>
        </a>
        <a href="change-password.php">
          <li>Change Password</li>
        </a>
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>


    <!-- form -->
    <div class="container">
      <h1>Change Password</h1>
      <form action="change-password.php" method="post">
        <input type="password" name="oldPassword" placeholder="Enter old password" required>
        <input type="password" name="newPassword" placeholder="Enter new password" required>

        <input type="submit" name="changePassword" value="Change Password">
      </form>
    </div>
  </div>
</body>

</html>