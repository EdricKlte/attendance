<?php 
  require('./php/session.php');
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $id = $_SESSION['id'];
  $queryClassList = "SELECT * FROM assign WHERE teachers = '$id' ";
  $sqlClassList = mysqli_query($con, $queryClassList);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLASS LIST IN SUBJECTS</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/class-list-page.css">

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
        <a href="class-list-page.php">
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

    <!-- container -->
    <div class="container">
      <h1>Class List for Subjects</h1>

      <table>
        <tr>
          <th>Subjects</th>
          <th>Sections</th>
          <th>Actions</th>
        </tr>
        <?php while($results = mysqli_fetch_array($sqlClassList)) {  ?>
        <tr>
          <td><?php echo $results['subjects'] ?></td>
          <td><?php echo $results['sections'] ?></td>
          <td>
            <form action="class-list.php" method="post">
              <input type="submit" value="OPEN CLASS LIST" class="class-list-btn">
            </form>
          </td>
        </tr>
        <?php } ?>

      </table>
    </div>
  </div>
</body>

</html>