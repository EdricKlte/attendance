<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  // session
  require './php/session.php';


  $usersId = $_SESSION['id']; 
  $query = "SELECT * FROM assign WHERE teachers = '$usersId' ";
  $sql = mysqli_query($con, $query);

  $semester = $_POST['semester'];

  $teacher = $_SESSION['name'];
  $sections = $_SESSION['sections'];
  $subjects = $_SESSION['subjects'];


  $querySheetRecord = "SELECT * FROM sheet_record WHERE sections = '$sections' AND subjects = '$subjects' AND users_id = '$usersId' AND semester = '$semester' ";
  $sqlSheetRecord = mysqli_query($con, $querySheetRecord);
  
  
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
      <table>
        <tr>
          <td colspan="4">
            <?php 
            if($semester == "first_sem"){
              echo "<h1>Summary of Attendance for the First Semester</h1>"; 
            }
            else if($semester == "second_sem"){
              echo "<h1>Summary of  Attendance for the Second Semester</h1>";
            }
            ?>
          </td>
        </tr>
    <?php
    //$totalPresent;
    //$totalAbsent;
    while($sheetRecord = mysqli_fetch_array($sqlSheetRecord)){
  		$daysCount = $sheetRecord['days'];
    	$year = $sheetRecord['year'];
    	$month = $sheetRecord['month'];
    	$sheetID = $sheetRecord['id'];
    	switch($month){
    		case 1 : 
                $month1 = "January";
                break;
                case 2 : 
                $month1 = "February";
                break;
                case 3 : 
                $month1 = "March";
                break;
                case 4 : 
                $month1 = "April";
                break;
                case 5 : 
                $month1 = "May";
                break;
                case 6 : 
                $month1 = "June";
                break;
                case 7 : 
                $month1 = "July";
                break;
                case 8 : 
                $month1 = "August";
                break;
                case 9 : 
                $month1 = "September";
                break;
                case 10 : 
                $month1 = "October";
                break;
                case 11 : 
                $month1 = "November";
                break;
                case 12 : 
                $month1 = "December";
                break;
                default:
                $month1 = "erroR";
    	}
      echo "<tr><td colspan=4><h1>".$month1." ".$year."</h1></td></tr>";?>
      
        <tr>
          <th>Student No.</th>
          <th>Student</th>
          <th>Present</th>
          <th>Absent</th>
        </tr>
        <?php
        $queryClassList = "SELECT * FROM class_list WHERE users_id = '$usersId' AND section = '$sections' AND subject = '$subjects' order by last_name ";
        $sqlClassList = mysqli_query($con, $queryClassList);
        while($classListResult = mysqli_fetch_array($sqlClassList)) {//WHILE
          $studentID = $classListResult['students_id'];
          $studentFn = $classListResult['first_name'];
          $studentLn = $classListResult['last_name'];
          $studentNumber = $classListResult['students_id'];
          $section1 = $classListResult['section'];
          $subject1 = $classListResult['subject'];    
          echo "<tr><td>".$studentNumber."</td>";
          echo "<td>".$studentLn. ', ' .$studentFn."</td>";
          $present = 0;
          $absent = 0;
          for($a=1;$a<=$daysCount;$a++){
            $select = "SELECT * FROM attendance WHERE sections = '$section1' AND subjects='$subject1' AND students_id = '$studentID' AND day = $a AND month = $month AND sheetID = $sheetID  ";
            $sqlselect = mysqli_query($con, $select);
            if($row=mysqli_fetch_array($sqlselect)){//if0
              if($classListResult['students_id']==$row['students_id']){
                if($row['Status']==1 && $row['day']==$a ){
                  $present = $present + 1;
                  
                }
                else if($row['Status']==0 && $row['day']==$a){
                  $absent = $absent +1;

                }
              }
            }

          }
          //$totalPresent = $totalPresent + $present;
          //$totalAbsent = $totalAbsent + $present;
          echo "<td>".$present."</td>";
          echo "<td>".$absent."</td></tr>";

        }//WHILE
        }
        /*echo "<td colspan=2>TOTAL PRESENT AND ABSENT</td>";
        echo "<td>".$totalPresent."</td>";
        echo "<td>".$totalAbsent."</td>";*/
        ?>

      </table>
      <form action="exportExcelSemester.php?ID=<?php echo $semester ?>" method="post">
        <button type="submit" value="export">Download Excel</button>
      </format>
    </div>
  </div>
</body>

</html>