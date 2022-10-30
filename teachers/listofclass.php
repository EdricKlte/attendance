<?php 
  require('./php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $id = $_SESSION['id'];
  $query = "SELECT * FROM assign WHERE teachers = '$id' ";
  $sql = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LIST OF CLASS</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/listofclass.css">

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
          <li>Welcome: <?php echo $_SESSION['name'] ?></li>
        </a>
        <a href="class-list.php">
          <li>Class List</li>
        </a>
        <a href="listofclass.php">
          <li>List of Class</li>
        </a>

        <a href="change-password.php">
          <li>Change Password</li>
        </a>
        <form action="./php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <!-- container -->
    <div class="container">
      <h1>LIST OF CLASS</h1>

      <table>
        <tr>
          <th>Subjects</th>
          <th>Sections</th>
          <th></th>
        </tr>
        <?php while($results = mysqli_fetch_array($sql)) { ?>
        <tr>
          <td><?php echo $results['subjects'] ?></td>
          <td><?php echo $results['sections'] ?></td>
          <td>
            <form action="listofclass.php" method="get">
              <button type="submit" class="open-class" id="OpenClass" name="OpenClass" value="<?php 
                echo $results['subjects']."+".$results['sections'];
                ?>">Open Class
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
//
if(ISSET($_GET['OpenClass'])){
  $Value = $_GET['OpenClass'];
  $Value = explode("+",$Value);

  $subjects = $Value[0];
  $sections = $Value[1];

  $_SESSION['archive']="no";
  $_SESSION['subjects']=$subjects;
  $_SESSION['sections']=$sections;
  pathTo('attendance-record');
  header('Location: attendance-record.php');

}

?>