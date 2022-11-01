<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  session_start();
  
  if (empty($_SESSION['teacher-status'])) {
    $_SESSION['teacher-status'] = 'invalid';
  }
  
  if ($_SESSION['teacher-status'] == 'valid') {
    echo "<script>window.location.href = '/attendance/teachers/listofclass.php'</script>";
  }

  if (isset($_POST['login'])) {
    $employeeNo = trim($_POST['employeeNo']);
    $password = trim($_POST['password']);
    $passwordEncrypt = md5($password);

    $queryLogin = "SELECT * FROM users WHERE employee_no = '$employeeNo' AND password = '$passwordEncrypt'";
    $sqlLogin = mysqli_query($con, $queryLogin);
    $result = mysqli_fetch_array($sqlLogin);

    if (mysqli_num_rows($sqlLogin) > 0) {
      $_SESSION['teacher-status'] = 'valid';
      $_SESSION['name'] = $result['first_name'];
      $_SESSION['id'] = $result['id'];
      echo '<script>window.location.href = "/attendance/teachers/listofclass.php"</script>';
    } else {
      $_SESSION['teacher-status'] = 'invalid';
      echo '<script>alert("Wrong username and password")</script>';
      echo '<script>window.location.href = "/attendance/teachers/login.php"</script>';
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
      <img src="./img/sjc-bg-black.png" alt="Saint Jude College" />
      <div class="header2"></div>
    </div>

    <!-- form -->
    <div class="container">
      <img src="./img/admin.png" alt="Icon" />

      <form action="login.php" method="post">
        <input type="text" name="employeeNo" placeholder="Enter Employee No" required />
        <input type="password" name="password" placeholder="Enter Password" required />
        <input type="submit" value="Login" name="login" />
        <p>Forgot Password? <a href="./forgot-password.php">Click Here</a></p>
      </form>
    </div>

  </div>
</body>

</html>