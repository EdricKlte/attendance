<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  // session
  require 'session.php';

  // edit
  if(isset($_POST['edit'])) {
    $editId = $_POST['editId'];
    $editLastName = trim($_POST['editLastName']);
    $editFirstName = trim($_POST['editFirstName']);
    $editEmployeeNo = trim($_POST['editEmployeeNo']);
    $editEmail = trim($_POST['editEmail']);
    $editPassword = trim($_POST['editPassword']);
  }

  // update
  if (isset($_POST['update'])) {
    $updateId = $_POST['updateId'];
    $updateLastName = trim($_POST['updateLastName']);
    $updateFirstName = trim($_POST['updateFirstName']);
    $updateEmployeeNo = trim($_POST['updateEmployeeNo']);
    $updateEmail = trim($_POST['updateEmail']);
    $updatePassword = trim($_POST['updatePassword']);
    $passwordEncrypt = md5($updatePassword);

    $queryUpdate = "UPDATE users SET last_name = '$updateLastName', first_name = '$updateFirstName', employee_no = '$updateEmployeeNo', email = '$updateEmail', password = '$passwordEncrypt' WHERE id = '$updateId' ";
    $sqlUpdate = mysqli_query($con, $queryUpdate);

    pathTo('register');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE TEACHER ACCOUNTS</title>

  <!-- css -->
  <link rel="stylesheet" href="../css/register.css">

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
        <form action="logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <h1>Register a Teacher Accounts</h1>
      <form action="register-update.php" method="post">
        <input type="text" name="updateLastName" placeholder="Enter the last name" value="<?php echo $editLastName ?>">
        <input type="text" name="updateFirstName" placeholder="Enter the first name"
          value="<?php echo $editFirstName ?>">
        <input type="text" name="updateEmployeeNo" placeholder="Enter the employee no"
          value="<?php echo $editEmployeeNo ?>">
        <input type="text" name="updateEmail" placeholder="Enter the email" value="<?php echo $editEmail ?>">
        <input type="password" name="updatePassword" placeholder="Enter the password"
          value="<?php echo $editPassword ?>">

        <input type="submit" name="update" value="UPDATE">
        <input type="hidden" name="updateId" value="<?php echo $editId ?>">
      </form>
    </div>

  </div>
</body>

</html>