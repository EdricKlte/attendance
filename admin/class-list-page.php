<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  // session
  require './php/session.php';

  $queryClassList = "SELECT * FROM assign";
  $sqlClassList = mysqli_query($con, $queryClassList);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Class List</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/class-list-page.css">

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
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      <h1>Class List for Subjects</h1>
      <table>
        <tr>
          <th>Teacher</th>
          <th>Subjects</th>
          <th>Sections</th>
          <th>Actions</th>
        </tr>
        <?php while($results = mysqli_fetch_array($sqlClassList)) {
            $usersID = $results['teachers'];
            
            $queryTeacherList = "SELECT * FROM users WHERE id = $usersID";
            $sqlTeacherList = mysqli_query($con, $queryTeacherList);
            
            if($results1 = mysqli_fetch_array($sqlTeacherList)){
              $teacher = $results1['last_name'];
            }
          ?>
        <tr>
          <td><?php echo $teacher; ?></td>
          <td><?php echo $results['subjects'] ?></td>
          <td><?php echo $results['sections'] ?></td>
          <td>
            <form action="class-list-page.php" method="get">
              <button type="submit" class="class-list-btn" id="OpenClass" name="OpenClass" value="<?php 
                echo $results['subjects']."+".$results['sections']."+".$usersID;
                ?>">OPEN CLASS LIST
              </button>
              
            </form>
          </td>
        </tr>
        <?php } ?>

      </table>
    </div>


  </div>
</body>

</html>

<?php 


if(ISSET($_GET['OpenClass'])){
  $Value = $_GET['OpenClass'];
  $Value = explode("+",$Value);
  $subjects = $Value[0];
  $sections = $Value[1];
  $usersID = $Value[2];

  $_SESSION['subjects']=$subjects;
  $_SESSION['sections']=$sections;
  $_SESSION['id']=$usersID;
  pathTo(' class-list');
  header('Location: class-list.php');

}

?>