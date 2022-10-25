<?php 
  require('./php/session.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>COURSE</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/add-course.css" />

  <!-- js -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="./js/sidebar.js" defer></script>
  <script src="./js/search.js" defer></script>
</head>

<body>
  <div class="main">
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc.png" alt="Saint Jude College" />
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
        <a href="add-course.php">
          <li>Course</li>
        </a>
        <a href="add-subject.php">
          <li>Subject</li>
        </a>
        <a href="add-section.php">
          <li>Section</li>
        </a>
        <a href="assign.php">
          <li>Assign a Class</li>
        </a>
        <form action="/attendance/admin/php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <h1>Course</h1>

      <!-- search bar -->
      <div class="search-bar">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" class="search" id="search" placeholder="Search for Course..">
      </div>

      <!-- table -->
      <table id="myTable">
        <tr>
          <th>Course</th>
          <th></th>
        </tr>
        <tr>
          <td>BS Criminology</td>
          <td><a href="./section/bscrim-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bscrim-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>

        </tr>
        <tr>
          <td>BS Accountancy</td>
          <td><a href="./section/bsa-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsa-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Nursing</td>
          <td><a href="./section/bsn-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsn-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Respiratory Theraphy</td>
          <td><a href="./section/bsresp-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsresp-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Medical Technology</td>
          <td><a href="./section/bsmt-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsmt-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Information Technology</td>
          <td><a href="./section/bsit-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsit-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Radiologic Technology</td>
          <td><a href="./section/bsrt-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsrt-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Physical Theraphy</td>
          <td><a href="./section/bspt-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bspt-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Psychology</td>
          <td><a href="./section/bspsych-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bspsych-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Pharmacy</td>
          <td><a href="./section/bspharma-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bspharma-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Hospitality Management</td>
          <td><a href="./section/bshm-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bshm-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Tourism Management</td>
          <td><a href="./section/bstm-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bstm-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Business Administration Major in Financial Management</td>
          <td><a href="./section/bsbafm-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsbafm-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>BS Business Administration Major in Marketing Management</td>
          <td><a href="./section/bsbamm-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bsbamm-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>Bachelor of Elementary Education</td>
          <td><a href="./section/boee-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/boee-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>Bachelor of Secondary Education Major in English</td>
          <td><a href="./section/bosee-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bosee-subject.php  "><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
        <tr>
          <td>Bachelor of Secondary Education Major in Filipino</td>
          <td><a href="./section/bosef-section.php"><input type="button" class="button" value="SECTION" /></a></td>
          <td><a href="./subject/bosef-subject.php"><input type="button" class="button" value="SUBJECT" /></a></td>
        </tr>
      </table>

    </div>

  </div>
</body>

</html>