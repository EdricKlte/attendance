<?php 
  require './php/session.php';
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $query = "SELECT * FROM add_section";
  $sql = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADD SECTION</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/add-section.css" />

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="./js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
      <div class="header2"></div>
    </div>

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
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <form action="/attendance/admin/php/section-add.php" method="post">
        <h1>Add Section</h1>

        <!-- department -->
        <select name="department" id="department" required>
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
        <select name="course" id="course" required>
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
        <select name="year-level" id="year-level" required>
          <option disabled selected value>--Year Level--</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
          <option value="5th">5th</option>
        </select>

        <!-- add section -->
        <input type="text" name="add-section" placeholder="Add Section" required />

        <!-- add button -->
        <input type="submit" name="add" value="ADD" />
      </form>
    </div>

    <div class="container2">
      <table>
        <tr>
          <th>Department</th>
          <th>Course</th>
          <th>Year Level</th>
          <th>Section</th>
          <th></th>
          <th></th>
        </tr>
        <?php while($results = mysqli_fetch_array($sql)) { ?>
        <tr>
          <td><?php echo $results['department'] ?></td>
          <td><?php echo $results['course'] ?></td>
          <td><?php echo $results['year_level'] ?></td>
          <td><?php echo $results['section'] ?></td>
          <td>
            <form action="/attendance/admin/php/section-update.php" method="post">
              <input type="submit" name="edit" value="Edit" />
              <input type="hidden" name="editId" value="<?php echo $results['section_id'] ?>">
              <input type="hidden" name="editDepartment" value="<?php echo $results['department'] ?>">
              <input type="hidden" name="editCourse" value="<?php echo $results['course'] ?>">
              <input type="hidden" name="editYearLevel" value="<?php echo $results['year_level'] ?>">
              <input type="hidden" name="editSection" value="<?php echo $results['section'] ?>">
            </form>
          </td>
          <td>
            <form action="./php/section-delete.php" method="post">
              <input type="submit" name="delete" value="Delete" />
              <input type="hidden" name="deleteId" value="<?php echo $results['section_id'] ?>">
            </form>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>