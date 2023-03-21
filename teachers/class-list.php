  <?php 
  require('./php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  $id = $_SESSION['id'];
  $subjects = $_SESSION['subjects'];
  $sections = $_SESSION['sections'];
  
  // $query = "SELECT * FROM class_list WHERE users_id = '$id' AND subjects = '$subjects' AND sections = '$sections'";
  // $sql = mysqli_query($con, $query);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CLASS LIST</title>

    <!-- css -->
    <link rel="stylesheet" href="./css/class-list.css" />

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
            <li>Welcome: <?php echo $_SESSION['name'] ?></li>
          </a>
          <a href="class-list-page.php">
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

      <!-- container input -->
      <div class="container">
        <h1>Add students to your class</h1>

        <!-- import link -->
        <form action="./php/import-classlist.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file">
          <input type="submit" name="import" value="IMPORT">
        </form>

      </div>

      <!-- student list -->
      <div class="students-list">
        <form action="class-list-page.php" method="get">
          <button type="submit" class="back">Back</button><br>
        </form><br>
        <table>
          <thead>
            <tr>
              <th>Student No:</th>
              <th>Last Name:</th>
              <th>First Name:</th>
              <th>Course:</th>
              <th>Section:</th>
              <th>Subject:</th>
              <th>Date Modified:</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $openClass = $_POST["OpenClass"]; 

            if($openClass != "allList"){
              $result = $con->query("SELECT * FROM class_list WHERE users_id = '$id' AND subject = '$subjects' AND section = '$sections' ");
            }
            else{
                $result = $con->query("SELECT * FROM class_list WHERE users_id = '$id' ");
            }
              if ($result->num_rows > 0) {
                while($row = $result->fetch_array()){
                  ?>

            <tr>
              <td><?php echo $row['students_id'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['course'] ?></td>
              <td><?php echo $row['section'] ?></td>
              <td><?php echo $row['subject'] ?></td>
              <td><?php echo $row['dateModified']?></td>
              <td>
                <form action="./php/classList-update.php" method="post">
                  <input type="submit" value="EDIT" name="edit" class="edit">
                  <input type="hidden" name="editId" value="<?php echo $row['id'] ?>">
                  <input type="hidden" name="editStudentId" value="<?php echo $row['students_id'] ?>">
                  <input type="hidden" name="editLastName" value="<?php echo $row['last_name'] ?>">
                  <input type="hidden" name="editFirstName" value="<?php echo $row['first_name'] ?>">
                  <input type="hidden" name="editCourse" value="<?php echo $row['course'] ?>">
                  <input type="hidden" name="editSection" value="<?php echo $row['section'] ?>">
                  <input type="hidden" name="editSubject" value="<?php echo $row['subject'] ?>">
                </form>
              </td>
            </tr>
            <?php
                }
              } else {
                ?>
            <tr>
              <td colspan="8">No Class List Found...</td>
            </tr>
            <?php
              }
            ?>
          </tbody>

        </table>
      </div>

    </div>
  </body>

  </html>