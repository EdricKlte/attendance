<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  // session
  require './php/session.php';

  $queryAccounts = "SELECT * FROM users";
  $sqlAccounts = mysqli_query($con, $queryAccounts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER A TEACHER</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/register.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="./js/sidebar.js" defer></script>
</head>

<body>
  <div class="main">
    <!-- header -->
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc-bg-black.png" alt="Saint Jude College" />
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
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <h1>Register a Teacher Accounts</h1>
      <form action="./php/register-create.php" method="post">
        <input type="text" name="lastName" placeholder="Enter the last name">
        <input type="text" name="firstName" placeholder="Enter the first name">
        <input type="text" name="employeeNo" placeholder="Enter the employee no">
        <input type="email" name="email" placeholder="Enter the email">
        <input type="password" name="password" placeholder="Enter the password">

        <input type="submit" name="register" value="REGISTER">
      </form>
    </div>

    <div class="container2">
      <table>
        <tr>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Employee No</th>
          <th>Email</th>
          <th>Password</th>
          <th colspan="2">Action</th>
        </tr>

        <?php while($r = mysqli_fetch_array($sqlAccounts)) { ?>
        <tr>
          <td><?php echo $r['last_name'] ?></td>
          <td><?php echo $r['first_name'] ?></td>
          <td><?php echo $r['employee_no'] ?></td>
          <td><?php echo $r['email'] ?></td>
          <td><?php echo $r['password'] ?></td>
          <td>
            <form action="./php/register-update.php" method="post">
              <input type="submit" name="edit" value="EDIT" class="edit">
              <input type="hidden" name="editId" value="<?php echo $r['id'] ?>">
              <input type="hidden" name="editLastName" value="<?php echo $r['last_name'] ?>">
              <input type="hidden" name="editFirstName" value="<?php echo $r['first_name'] ?>">
              <input type="hidden" name="editEmployeeNo" value="<?php echo $r['employee_no'] ?>">
              <input type="hidden" name="editEmail" value="<?php echo $r['email'] ?>">
              <input type="hidden" name="editPassword" value="<?php echo $r['password'] ?>">
            </form>
          </td>
          <td>
            <form action="./php/register-delete.php" method="post">
              <input type="submit" name="delete" value="DELETE" class="delete">
              <input type="hidden" name="deleteId" value="<?php echo $r['id'] ?>">
            </form>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>

  </div>
</body>

</html>