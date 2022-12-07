<?php 
  require './php/session.php';
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";


  $query = "SELECT * FROM add_subject";
  $sql = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADD SUBJECT</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/add-subject.css" />

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
        <a href="register.php">
          <li>Register a Teacher</li>
        </a>
        <a href="class-list-page.php">
          <li>Class List</li>
        </a>
        <form action="/attendance/admin/php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <form action="./php/subject-add.php" method="post">
        <h1>Add Subject</h1>

        <!-- subject -->
        <input type="text" name="subject" placeholder="Add Subject" required />

        <!-- year -->
        <select name="year" required>
          <option disabled selected value>--Select year--</option>
          <option>1st</option>
          <option>2nd</option>
          <option>3rd</option>
          <option>4th</option>
          <option>5th</option>
        </select>

        <!-- course -->
        <select name="course" required>
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

        <!-- add button -->
        <input type="submit" name="addSubject" value="ADD" />
      </form>
    </div>

    <div class="container2">
      <table>
        <tr>
          <th>Subject</th>
          <th>Year Level</th>
          <th>Course</th>
          <th colspan="2">Action</th>
        </tr>

        <?php while($results = mysqli_fetch_array($sql)) { ?>
        <tr>
          <td><?php echo $results['subject_name'] ?></td>
          <td><?php echo $results['year'] ?></td>
          <td><?php echo $results['course'] ?></td>
          <td>
            <form action="./php/subject-update.php" method="post">
              <input type="submit" name="edit" value="EDIT" />
              <input type="hidden" name="editId" value="<?php echo $results['subject_id'] ?>">
              <input type="hidden" name="editSubject" value="<?php echo $results['subject_name'] ?>">
              <input type="hidden" name="editCourse" value="<?php echo $results['course'] ?>">
              <input type="hidden" name="editYearLevel" value="<?php echo $results['year'] ?>">
            </form>
          </td>
          <td>
            <form action="./php/subject-delete.php" method="post">
              <input type="submit" name="delete" value="DELETE" />
              <input type="hidden" name="deleteId" value="<?php echo $results['subject_id'] ?>">
            </form>
          </td>
        </tr>
        <?php } ?>

      </table>
    </div>
  </div>
</body>

</html>