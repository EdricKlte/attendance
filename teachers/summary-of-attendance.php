<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  // session
  require './php/session.php';

  $id = $_SESSION['id'];
  $query = "SELECT * FROM assign WHERE teachers = '$id' ";
  $sql = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUMMARY OF ATTENDANCE</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/summary-of-attendance.css">

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
        <a href="summary-of-attendance.php">
          <li>Summary of Attendance</li>
        </a>
        <a href="change-password.php">
          <li>Change Password</li>
        </a>
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="table-container">
      <h1>Summary of Attendance</h1>

      <table>
        <tr>
          <th>List of Subjects</th>
          <th>Action</th>
        </tr>

        <?php while($r = mysqli_fetch_array($sql)) { ?>
        <tr>
          <td><?php echo $r['subjects'] ?></td>
          <td>
            <div class="open-container">
              <a href="#">OPEN</a>
            </div>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</body>

</html>