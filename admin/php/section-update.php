<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  require 'session.php';

  if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    $editDepartment = $_POST['editDepartment'];
    $editCourse = $_POST['editCourse'];
    $editYearLevel = $_POST['editYearLevel'];
    $editSection = $_POST['editSection'];
  }

  if (isset($_POST['update'])) {
    $updateId = $_POST['updateId'];
    $updateDepartment = $_POST['updateDepartment'];
    $updateCourse = $_POST['updateCourse'];
    $updateYearLevel = $_POST['updateYearLevel'];
    $updateSection = $_POST['updateSection'];

    $queryUpdate = "UPDATE add_section SET department = '$updateDepartment', course = '$updateCourse', year_level = '$updateYearLevel', section = '$updateSection' WHERE section_id = '$updateId' ";
    $sqlUpdate = mysqli_query($con, $queryUpdate);

    pathTo('add-section');
    
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UPDATE SECTION</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/add-section.css" />

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="../js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="../img/sjc-bg-color.png" alt="Saint Jude College" />
      <div class="header2"></div>
    </div>

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
      <form action="/attendance/admin/php/section-update.php" method="post">
        <h1>Update Course</h1>

        <!-- department -->
        <select name="updateDepartment" id="department" value="<?php echo $editDepartment ?>" required>
          <option disabled selected value>--Department--</option>
          <option value="College of Business Technology">College of Business Technology</option>
          <option value="College of Information Technology Education">College of Information Technology Education
          </option>
          <option value="College of Arts And Science">College of Arts And Science</option>
          <option value="College of Allied Health Services">College of Allied Health Services</option>
          <option value="College of Criminology">College of Criminology</option>
          <option value="College of Education">College of Education</option>
        </select>

        <!-- course -->
        <select name="updateCourse" id="course" value="<?php echo $editCourse ?>" required>
          <option disabled selected value>--Select Course--</option>
          <option value="BS Criminology">BS Criminology</option>
          <option value="BS Accountancy">BS Accountancy</option>
          <option value="BS Nursing">BS Nursing</option>
          <option value="BS Physical Theraphy">BS Physical Theraphy</option>
          <option value="BS Respiratory Theraphy">BS Respiratory Theraphy</option>
          <option value="BS Medical Technology">BS Medical Technology</option>
          <option value="BS Information Technology">BS Information Technology</option>
          <option value="BS Radiologic Technology">BS Radiologic Technology</option>
          <option value="BS Psychology">BS Psychology</option>
          <option value="BS Pharmacy">BS Pharmacy</option>
          <option value="BS Hospitality Management">BS Hospitality Management</option>
          <option value="BS Tourism Management">BS Tourism Management</option>
          <option value="BS Business Administration Major in Financial Management">BS Business Administration Major in
            Financial Management</option>
          <option value="BS Business Administration Major in Marketing Management">BS Business Administration Major
            in Marketing Management</option>
          <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
          <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in
            English</option>
          <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in
            Filipino</option>
        </select>

        <!-- year level -->
        <select name="updateYearLevel" id="year-level" value="<?php echo $editYearLevel ?>" required>
          <option disabled selected value>--Year Level--</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
        </select>

        <input type="text" name="updateSection" value="<?php echo $editSection ?>" placeholder="Add Section" required />
        <input type="submit" name="update" value="UPDATE" />
        <input type="hidden" name="updateId" value="<?php echo $editId ?>">
      </form>
    </div>

  </div>
</body>

</html>