<?php
  require('../php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $queryFirstYear = "SELECT * FROM add_section WHERE course = 'BS Business Administration Major in Marketing Management' AND year_level = '1st' ";
  $sqlFirstYear = mysqli_query($con, $queryFirstYear);

  $querySecondYear = "SELECT * FROM add_section WHERE course = 'BS Business Administration Major in Marketing Management' AND year_level = '2nd' ";
  $sqlSecondYear = mysqli_query($con, $querySecondYear);

  $queryThirdYear = "SELECT * FROM add_section WHERE course = 'BS Business Administration Major in Marketing Management' AND year_level = '3rd' ";
  $sqlThirdYear = mysqli_query($con, $queryThirdYear);

  $queryFourthYear = "SELECT * FROM add_section WHERE course = 'BS Business Administration Major in Marketing Management' AND year_level = '4th' ";
  $sqlFourthYear = mysqli_query($con, $queryFourthYear);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BSBAMM SECTION</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/section.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="../js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">

    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="../img/sjc.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
      <div class="header2"></div>
    </div>

    <!-- sidebar -->
    <div class="sidebar close">
      <ul class="menu-container">
        <i class="fa-solid fa-xmark" id="close"></i>
        <a href="#">
          <li>Welcome <?php echo $_SESSION['username'] ?></li>
        </a>
        <a href="../add-course.php">
          <li>Course</li>
        </a>
        <a href="../add-subject.php">
          <li>Subject</li>
        </a>
        <a href="../add-section.php">
          <li>Section</li>
        </a>
        <a href="../assign.php">
          <li>Assign a Class</li>
        </a>
        <form action="../php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <!-- container -->
    <div class="container-firstYear">
      <h1>1st Year</h1>

      <table>
        <tr>
          <th>Section</th>
        </tr>
        <?php while($resultsFirstYear = mysqli_fetch_array($sqlFirstYear)) { ?>
        <tr>
          <td><?php echo $resultsFirstYear['section'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="container-secondYear">
      <h1>2nd Year</h1>

      <table>
        <tr>
          <th>Section</th>
        </tr>
        <?php while($resultsSecondYear = mysqli_fetch_array($sqlSecondYear)) { ?>
        <tr>
          <td><?php echo $resultsSecondYear['section'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="container-thirdYear">
      <h1>3rd Year</h1>

      <table>
        <tr>
          <th>Section</th>
        </tr>
        <?php while($resultsThirdYear = mysqli_fetch_array($sqlThirdYear)) { ?>
        <tr>
          <td><?php echo $resultsThirdYear['section'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="container-fourthYear">
      <h1>4th Year</h1>

      <table>
        <tr>
          <th>Section</th>
        </tr>
        <?php while($resultsFourthYear = mysqli_fetch_array($sqlFourthYear)) { ?>
        <tr>
          <td><?php echo $resultsFourthYear['section'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>