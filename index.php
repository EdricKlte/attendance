<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Attendance Monitoring System</title>

  <!-- css -->
  <link rel="stylesheet" href="index.css" />

  <?php 
  session_start();
  $_SESSION['teacher-status'] = 'invalid';
  ?>
</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <img src="./admin/img/sjc-bg-black.png" alt="SJC Logo">
      <div class="header2"></div>
    </div>

    <h1>Attendance Monitoring System</h1>

    <div class="container">
      <a href="/attendance/admin/login.php">
        <div class="box">Admin</div>
      </a>
      <a href="./teachers/login.php">
        <div class="box">Teacher</div>
      </a>
    </div>
  </div>
</body>

</html>