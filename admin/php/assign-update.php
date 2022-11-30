<?php
  require 'session.php';
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $queryTeachers = "SELECT * FROM users";
  $sqlTeachers = mysqli_query($con, $queryTeachers);

  $querySections = "SELECT * FROM add_section";
  $sqlSections = mysqli_query($con, $querySections);

  $querySubjects = "SELECT * FROM add_subject";
  $sqlSubjects = mysqli_query($con, $querySubjects);

  // edit
  if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    $editDepartment = $_POST['editDepartment'];
    $editTeachers = $_POST['editTeachers'];
    $editSections = $_POST['editSections'];
    $editSubjects = $_POST['editSubjects'];
  }

  // update
  if (isset($_POST['update'])) {
    $updateId = $_POST['updateId'];
    $updateDepartments = $_POST['updateDepartments'];
    $updateTeachers = $_POST['updateTeachers'];
    $updateSections = $_POST['updateSections'];
    $updateSubjects = $_POST['updateSubjects'];

    $queryUpdate = "UPDATE assign SET departments = '$updateDepartments', teachers = '$updateTeachers', sections = '$updateSections', subjects = '$updateSubjects' WHERE id = '$updateId'" ;
    $sqlUpdate = mysqli_query($con, $queryUpdate);

    pathTo('assign');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/assign.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="../js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">

    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="../img/sjc-bg-color.png" alt="Saint Jude College" />
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
        <a href="../register.php">
          <li>Register a Teacher</li>
        </a>
        <form action="/attendance/admin/php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">

      <h1>Update a Class</h1>

      <form action="assign-update.php" method="post">

        <select name="updateDepartments" id="department" value="<?php echo $editDepartment ?>" required>
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
        <select name="updateTeachers" id="teachers" value="<?php echo $editTeachers ?>" required>
          <option disabled selected value>--Assign a Teachers--</option>
          <?php while($resultsTeachers = mysqli_fetch_array($sqlTeachers)) { ?>
          <option value="<?php echo $resultsTeachers['id'] ?>">
            <?php echo $resultsTeachers['last_name']. ", " . $resultsTeachers['first_name'] ?>
          </option>
          <?php } ?>
        </select>

        <!-- section -->
        <select name="updateSections" id="section" value="<?php echo $editSections ?>" required>
          <option disabled selected value>--Assign a Section</option>
          <?php while($resultsSections = mysqli_fetch_array($sqlSections)) { ?>
          <option value="<?php echo $resultsSections['section'] ?>"><?php echo $resultsSections['section'] ?></option>
          <?php } ?>
        </select>

        <!-- subject -->
        <select name="updateSubjects" id="subject" value="<?php echo $editSubjects ?>" required>
          <option disabled selected value>--Assign a Subject</option>
          <?php while($resultsSubjects = mysqli_fetch_array($sqlSubjects)) { ?>
          <option value="<?php echo $resultsSubjects['subject_name'] ?>"><?php echo $resultsSubjects['subject_name'] ?>
          </option>
          <?php } ?>
        </select>

        <!-- submit button -->
        <input type="submit" name="update" value="UPDATE">
        <input type="hidden" name="updateId" value="<?php echo $editId ?>">
      </form>

    </div>

  </div>
</body>

</html>