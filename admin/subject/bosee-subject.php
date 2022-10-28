<?php 
  require('../php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $queryFirstYear = "SELECT * FROM add_subject WHERE course = 'Bachelor of Secondary Education Major In English' AND year = '1st'";
  $sqlFirstYear = mysqli_query($con, $queryFirstYear);

  $querySecondYear = "SELECT * FROM add_subject WHERE course = 'Bachelor of Secondary Education Major In English' AND year = '2nd'";
  $sqlSecondYear = mysqli_query($con, $querySecondYear);

  $queryThirdYear = "SELECT * FROM add_subject WHERE course = 'Bachelor of Secondary Education Major In English' AND year = '3rd'";
  $sqlThirdYear = mysqli_query($con, $queryThirdYear);

  $queryFourthYear = "SELECT * FROM add_subject WHERE course = 'Bachelor of Secondary Education Major In English' AND year = '4th'";
  $sqlFourthYear = mysqli_query($con, $queryFourthYear);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOSEE SUBJECT</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/subject.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="../js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">

    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="../img/sjc-bg-black.png" alt="Saint Jude College" />
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

    <!-- list of subject -->
    <!-- container -->
    <div class="container-firstYear">
      <h1>1st Year</h1>

      <table>
        <tr>
          <th>Subject</th>
        </tr>
        <?php while($results = mysqli_fetch_array($sqlFirstYear)) { ?>
        <tr>
          <td><?php echo $results['subject_name'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="container-secondYear">
      <h1>2nd Year</h1>

      <table>
        <tr>
          <th>Subject</th>
        </tr>
        <?php while($resultSecondYear = mysqli_fetch_array($sqlSecondYear)) { ?>
        <tr>
          <td><?php echo $resultSecondYear['subject_name'] ?></td>
        </tr>
        <?php }?>
      </table>
    </div>
    <div class="container-thirdYear">
      <h1>3rd Year</h1>

      <table>
        <tr>
          <th>Subject</th>
        </tr>
        <?php while($resultThirdYear = mysqli_fetch_array($sqlThirdYear)) { ?>
        <tr>
          <td><?php echo $resultThirdYear['subject_name'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <div class="container-fourthYear">
      <h1>4th Year</h1>

      <table>
        <tr>
          <th>Subject</th>
        </tr>
        <?php while($resultFourthYear = mysqli_fetch_array($sqlFourthYear)) { ?>
        <tr>
          <td><?php echo $resultFourthYear['subject_name'] ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>