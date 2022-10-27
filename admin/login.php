<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  session_start();

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    echo "<script>window.location.href = '/attendance/admin/add-course.php'</script>";
  }
  
  if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) && empty($password)) {
      echo '<script>alert("Please Fill up the fields")</script>';
    } else {
      $queryLogin = "SELECT * FROM admin_account WHERE username = '$username' AND password = '$password'";
      $sqlLogin = mysqli_query($con, $queryLogin);
      $result = mysqli_fetch_array($sqlLogin);

      if (mysqli_num_rows($sqlLogin) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $result['username'];
        echo '<script>window.location.href = "/attendance/admin/add-course.php"</script>';
      } else {
        $_SESSION['status'] = 'invalid';
        echo '<script>alert("Wrong username and password")</script>';
        echo '<script>window.location.href = "/attendance/admin/login.php"</script>';  
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
      <div class="header2"></div>
    </div>

    <div class="container">
      <img src="./img/sjc-icon.png" alt="Icon" />

      <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Enter Username" required />
        <input type="password" name="password" placeholder="Enter Password" required />
        <input type="submit" value="Login" name="login" />
      </form>
    </div>
  </div>
</body>

</html>