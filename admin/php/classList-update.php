<?php 
  require('session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $querySubject = "SELECT * FROM add_subject";
  $sqlSubject = mysqli_query($con, $querySubject);

  $querySection = "SELECT * FROM add_section";
  $sqlSection = mysqli_query($con, $querySection);

  $dateModified = date("Y/m/d/H:i");

  function path($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }

  if (isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    $editLastName = trim($_POST['editLastName']);
    $editFirstName = trim($_POST['editFirstName']);
    $course = $_POST['editCourse'];
    $section = $_POST['editSection'];
    $subject = $_POST['editSubject'];
    $studentId = $_POST['editStudentId'];
  }

  if (isset($_POST['update'])) {
    $updateId = $_POST['updateId'];
    $updateLastName = $_POST['updateLastName'];
    $updateFirstName = $_POST['updateFirstName'];
    $updateCourse = $_POST['updateCourse'];
    $updateSection = $_POST['updateSection'];
    $updateSubject = $_POST['updateSubject'];
    $updateStudentId = $_POST['updateStudentId'];

    $queryUpdate = "UPDATE class_list SET last_name = '$updateLastName', first_name = '$updateFirstName', course = '$updateCourse', section = '$updateSection', subject = '$updateSubject', students_id = '$updateStudentId',  dateModified = '$dateModified' WHERE id = '$updateId' ";
    //$sqlUpdate = 
    if(mysqli_query($con, $queryUpdate)){
      path('class-list');  
    }
    else{
      echo $dateModified;
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UPDATE CLASS LIST</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/classlist-update.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>

  <script src="../js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="../img/sjc-bg-color.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
      <div class="header2"></div>
    </div>

    <!-- sidebar -->
    <div class="sidebar close">
      <ul class="menu-container">
        <i class="fa-solid fa-xmark" id="close"></i>

        <a href="#">
          <li>Welcome: <?php echo $_SESSION['username'] ?></li>
        </a>
        <a href="../class-list.php">
          <li>Class List</li>
        </a>
        <a href="../listofclass.php">
          <li>List of Class</li>
        </a>
        <a href="../change-password.php">
          <li>Change Password</li>
        </a>
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <!-- container input -->
    <div class="container">
      <h1>Update students to your class</h1>
      <form action="classList-update.php" method="post">

        <!-- name -->
        <input type="text" name="updateLastName" placeholder="Enter last name" value="<?php echo $editLastName ?>">
        <input type="text" name="updateFirstName" placeholder="Enter first name" value="<?php echo $editFirstName ?>">

        <!-- student Id -->
        <input type="text" name="updateStudentId" placeholder="Enter student number" value="<?php echo $studentId ?>">

        <!-- course -->
        <select name="updateCourse" id="s1" value="<?php echo $course ?>">
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
        <select name="updateSection" value="<?php echo $section ?>">
          <option disabled selected value>--section--</option>
          <?php while ($resultSection = mysqli_fetch_array($sqlSection)) { ?>
          <option><?php echo $resultSection['section'] ?></option>
          <?php } ?>
        </select>

        <!-- subject -->
        <select name="updateSubject" value="<?php echo $subject ?>">
          <option disabled selected value>--Subject--</option>
          <?php while($resultSubjects = mysqli_fetch_array($sqlSubject)) { ?>
          <option value="<?php echo $resultSubjects['subject_name'] ?>"><?php echo $resultSubjects['subject_name'] ?>
          </option>
          <?php } ?>
        </select>
        <input type="submit" name="update" value="UPDATE">
        <input type="hidden" name="updateId" value="<?php echo $editId ?>">
      </form>
    </div>
  </div>
</body>

</html>