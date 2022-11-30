<?php 
  require 'session.php';
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    $editSubject = trim($_POST['editSubject']);
    $editCourse = $_POST['editCourse'];
    $editYearLevel = $_POST['editYearLevel'];
  }

  if (isset($_POST['update'])) {
    $updateId = $_POST['updateId'];
    $updateSubject = trim($_POST['updateSubject']);
    $updateCourse = $_POST['updateCourse'];
    $updateYearLevel = $_POST['updateYearLevel'];

    $queryUpdateSubject = "UPDATE add_subject SET subject_name = '$updateSubject', year = '$updateYearLevel', course ='$updateCourse' WHERE subject_id = '$updateId'";
    $sqlUpdateSubject = mysqli_query($con, $queryUpdateSubject);

    echo "<script>window.location.href = '/attendance/admin/add-subject.php'</script>";
    
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UPDATE SUBJECT</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/add-subject.css" />

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
      <form action="subject-update.php" method="post">
        <h1>Update Subject</h1>

        <!-- subject -->
        <input type="text" name="updateSubject" value="<?php echo $editSubject ?>" placeholder="Update Subject"
          required />

        <!-- year level -->
        <select name="updateYearLevel" value="<?php echo $editYearLevel ?>" required>
          <option disabled selected value>--Select year--</option>
          <option>1st</option>
          <option>2nd</option>
          <option>3rd</option>
          <option>4th</option>
          <option>5th</option>
        </select>

        <!-- course -->
        <select name="updateCourse" <?php echo $editCourse ?> required>
          <option disabled selected value>--Select Course--</option>
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

        <!-- update button -->
        <input type="submit" name="update" value="UPDATE" />

        <!-- id -->
        <input type="hidden" name="updateId" value="<?php echo $editId ?>">
      </form>
    </div>

  </div>
</body>

</html>