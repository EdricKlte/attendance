<?php
  require './php/session.php';
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $queryTeachers = "SELECT * FROM users";
  $sqlTeachers = mysqli_query($con, $queryTeachers);

  $querySections = "SELECT * FROM add_section";
  $sqlSections = mysqli_query($con, $querySections);

  $querySubjects = "SELECT * FROM add_subject";
  $sqlSubjects = mysqli_query($con, $querySubjects);

  // fetching assign
  $queryDisplay = "SELECT * FROM assign";
  $sqlDisplay = mysqli_query($con, $queryDisplay);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASSIGN A CLASS</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/assign.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="./js/sidebar.js" defer></script>
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

      <h1>Assigned a Class</h1>

      <form action="./php/assign-create.php" method="post">

        <select name="departments" id="department" required>
          <option disabled selected value>--Department--</option>
          <option value="College of Business Technology">College of Business Technology</option>
          <option value="College of Information Technology Education">College of Information Technology Education
          </option>
          <option value="College of Arts And Science">College of Arts And Science</option>
          <option value="College of Allied Health Services">College of Allied Health Services</option>
          <option value="College of Criminology">College of Criminology</option>
          <option value="College of Education">College of Education</option>
        </select>

        <!-- teachers -->
        <select name="teachers" id="teachers" required>
          <option disabled selected value>--Assign a Teachers--</option>
          <?php while($resultsTeachers = mysqli_fetch_array($sqlTeachers)) { ?>
          <option value="<?php echo $resultsTeachers['fullname'] ?>"><?php echo $resultsTeachers['fullname'] ?>
          </option>
          <?php } ?>
        </select>

        <!-- section -->
        <select name="sections" id="section" required>
          <option disabled selected value>--Assign a Section</option>
          <?php while($resultsSections = mysqli_fetch_array($sqlSections)) { ?>
          <option value="<?php echo $resultsSections['section'] ?>"><?php echo $resultsSections['section'] ?></option>
          <?php } ?>
        </select>

        <!-- subject -->
        <select name="subjects" id="subject" required>
          <option disabled selected value>--Assign a Subject</option>
          <?php while($resultsSubjects = mysqli_fetch_array($sqlSubjects)) { ?>
          <option value="<?php echo $resultsSubjects['subject_name'] ?>"><?php echo $resultsSubjects['subject_name'] ?>
          </option>
          <?php } ?>
        </select>

        <!-- submit button -->
        <input type="submit" name="submit" value="SUBMIT">

      </form>

    </div>

    <div class="list">
      <table>
        <tr>
          <th>Department</th>
          <th>Teachers</th>
          <th>Sections</th>
          <th>Subjects</th>
          <th></th>
          <th></th>
        </tr>
        <?php while($results = mysqli_fetch_array($sqlDisplay)) { ?>
        <tr>
          <td><?php echo $results['department'] ?></td>
          <td><?php echo $results['teachers'] ?></td>
          <td><?php echo $results['sections'] ?></td>
          <td><?php echo $results['subjects'] ?></td>
          <td>
            <form action="./php/assign-update.php" method="post">
              <input type="submit" value="EDIT" name="edit" class="editRows">
              <input type="hidden" name="editId" value="<?php echo $results['id'] ?>">
              <input type="hidden" name="editDepartment" value="<?php echo $results['department'] ?>">
              <input type="hidden" name="editTeachers" value="<?php echo $results['teachers'] ?>">
              <input type="hidden" name="editSections" value="<?php echo $results['sections'] ?>">
              <input type="hidden" name="editSubjects" value="<?php echo $results['subjects'] ?>">
            </form>
          </td>
          <td>
            <form action="./php/assign-delete.php" method="post">
              <input type="submit" value="DELETE" name="delete" class="deleteRows">
              <input type="hidden" name="deleteId" value="<?php echo $results['id'] ?>">
            </form>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</body>

</html>