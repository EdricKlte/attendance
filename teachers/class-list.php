  <?php 
  require('./php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $querySubject = "SELECT * FROM add_subject";
  $sqlSubject = mysqli_query($con, $querySubject);
  
  $querySection = "SELECT * FROM add_section";
  $sqlSection = mysqli_query($con, $querySection);

  $id = $_SESSION['id'];
  $queryAttendanceSheet = "SELECT * FROM class_list WHERE users_id = '$id'";
  $sqlAttendanceSheet = mysqli_query($con, $queryAttendanceSheet);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CLASS LIST</title>

    <!-- css -->
    <link rel="stylesheet" href="./css/class-list.css" />

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

      <!-- container input -->
      <div class="container">
        <h1>Add students to your class</h1>
        <form action="./php/classList-create.php" method="post">

          <!-- student number -->
          <input type="text" name="studentNumber" placeholder="Enter student number">

          <!-- name -->
          <input type="text" name="lastName" placeholder="Enter last name">
          <input type="text" name="firstName" placeholder="Enter first name">

          <!-- course -->
          <select name="course" id="s1">
            <option disabled selected value>--Course--</option>
            <option value="BS Criminology">BS Criminology</option>
            <option value="BS Accountancy">BS Accountancy</option>
            <option value="BS Nursing">BS Nursing</option>
            <option value="BS Respiratory Theraphy">BS Respiratory Theraphy</option>
            <option value="BS Medical Technology">BS Medical Technology</option>
            <option value="BS Information Technology">BS Information Technology</option>
            <option value="BS Radiologic Technology">BS Radiologic Technology</option>
            <option value="BS Physical Theraphy">BS Physical Theraphy</option>
            <option value="BS Psychology">BS Psychology</option>
            <option value="BS Pharmacy">BS Pharmacy</option>
            <option value="BS Hospitality Management">BS Hospitality Management</option>
            <option value="BS Tourism Management">BS Tourism Management</option>
            <option value="BS Business Administration Major in Financial Management">BS Business Administration Major in
              Financial Management</option>
            <option value="BS Business Administration Major in Marketing Management">BS Business Administration Major in
              Marketing Management</option>
            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
            <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in
              English</option>
            <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in
              Filipino</option>
          </select>

          <!-- section -->
          <select name="section" id="s2">
            <option disabled selected value>--Select a section--</option>
            <?php while($results = mysqli_fetch_array($sqlSection)) { ?>
            <option value="<?php echo $results['section'] ?>"><?php echo $results['section'] ?></option>
            <?php } ?>
          </select>

          <!-- subject -->
          <select name="subject" id="s3">
            <option disabled selected value>--Subject--</option>
            <?php while($resultSubjects = mysqli_fetch_array($sqlSubject)) { ?>
            <option value="<?php echo $resultSubjects['subject_name'] ?>"><?php echo $resultSubjects['subject_name'] ?>
            </option>
            <?php } ?>
          </select>

          <input type="submit" name="create" value="ADD">

        </form>
      </div>

      <!-- students table -->
      <div class="students-list">
        <table>
          <tr>
            <th>Students Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Course</th>
            <th>Section</th>
            <th>Subject</th>
            <th colspan="2">Action</th>
          </tr>
          <?php while($resultsAttendance = mysqli_fetch_array($sqlAttendanceSheet)) { ?>

          <tr>
            <td><?php echo $resultsAttendance['students_id']?></td>
            <td><?php echo $resultsAttendance['last_name'] ?></td>
            <td><?php echo $resultsAttendance['first_name'] ?></td>
            <td><?php echo $resultsAttendance['course'] ?></td>
            <td><?php echo $resultsAttendance['section'] ?></td>
            <td><?php echo $resultsAttendance['subject'] ?></td>
            <td>
              <form action="./php/classList-update.php" method="post">
                <input type="submit" name="edit" class="edit" value="EDIT">
                <input type="hidden" name="editId" value="<?php echo $resultsAttendance['id'] ?>">
                <input type="hidden" name="editStudentsId" value="<?php echo $resultsAttendance['students_id'] ?>">
                <input type="hidden" name="editLastName" value="<?php echo $resultsAttendance['last_name'] ?>">
                <input type="hidden" name="editFirstName" value="<?php echo $resultsAttendance['first_name'] ?>">
                <input type="hidden" name="editCourse" value="<?php echo $resultsAttendance['course'] ?>">
                <input type="hidden" name="editSection" value="<?php echo $resultsAttendance['section'] ?>">
                <input type="hidden" name="editSubject" value="<?php echo $resultsAttendance['subject'] ?>">
              </form>
            </td>
            <td>
              <form action="./php/classList-delete.php" method="post">
                <input type="submit" name="delete" class="delete" value="DELETE">
                <input type="hidden" name="deleteId" value="<?php echo $resultsAttendance['id'] ?>">
              </form>
            </td>
          </tr>
          <?php } ?>
        </table>

      </div>
    </div>
  </body>

  </html>