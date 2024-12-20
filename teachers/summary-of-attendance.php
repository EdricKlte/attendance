<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  // session
  require './php/session.php';


  $usersId = $_SESSION['id']; 
  $query = "SELECT * FROM assign WHERE teachers = '$usersId' ";
  $sql = mysqli_query($con, $query);


  $teacher = $_SESSION['name'];
  $sections = $_SESSION['sections'];
  $subjects = $_SESSION['subjects'];

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUMMARY OF ATTENDANCE</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/summary-of-attendance.css">

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

    <div class="table-container">
      <h1>Summary of Attendance</h1>

      <table>
        <tr>
          <th>Months</th>
          <th>Year</th>
          <th>Semester</th>
          <th>Open</th>
        </tr>
        <tr><form action="summarize-semester.php" method="POST">
          <td colspan="2">
            <button value="first_sem" name="semester" type="submit">Summarize First Semester</button>
          </td>
          <td colspan="2">
            <button value="second_sem" name="semester" type="submit">Summarize Second Semester</button>
          </td>
        </form></tr>
        <?php 
          $querySheetRecord1 = "SELECT * FROM sheet_record WHERE users_id='$usersId' AND sections='$sections' AND subjects = '$subjects' AND archive ='no' ";
          $sqlSheetRecord1 = mysqli_query($con, $querySheetRecord1);
          while($sheetRecord1 = mysqli_fetch_array($sqlSheetRecord1)){
              $MONTH = $sheetRecord1['month'];
              $month;
              switch ($MONTH){
                case 1 : 
                $month = "January";
                break;
                case 2 : 
                $month = "February";
                break;
                case 3 : 
                $month = "March";
                break;
                case 4 : 
                $month = "April";
                break;
                case 5 : 
                $month = "May";
                break;
                case 6 : 
                $month = "June";
                break;
                case 7 : 
                $month = "July";
                break;
                case 8 : 
                $month = "August";
                break;
                case 9 : 
                $month = "September";
                break;
                case 10 : 
                $month = "October";
                break;
                case 11 : 
                $month = "November";
                break;
                case 12 : 
                $month = "December";
                break;
                default:
                $month = "erroR";
              }
              echo "</td><td>".$month;
              echo "</td><td>".$sheetRecord1['year'];
              echo "</td><td>".$sheetRecord1['semester'];
              echo "</td><td><a  href=attendance-summary.php?ID=".$sheetRecord1['id'].">OPEN</a> ";
              echo "</td></tr>";
          
            }
        ?>

      </table>
    </div>

  </div>
</body>

</html>