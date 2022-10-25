<?php 
  require('./php/session.php');
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";



  $usersId = $_SESSION['id']; 
  $teacher = $_SESSION['name'];
  $sections = $_SESSION['sections'];
  $subjects = $_SESSION['subjects'];
  $queryClassList = "SELECT * FROM class_list WHERE users_id = '$usersId' AND section = '$sections' AND subject = '$subjects'";
  $sqlClassList = mysqli_query($con, $queryClassList);
  


  //SELECT SHEET TO SHOW
  if(isset($_GET['ID'])){
    //SELECT THIS SHEET FROM SHEET RECORD
    $id = $_GET['ID'];
    $querySheetRecord = "SELECT * FROM sheet_record WHERE id = '$id'";
    $sqlSheetRecord = mysqli_query($con, $querySheetRecord);

  }
  else{
    $querySheetRecord = "SELECT * FROM sheet_record WHERE teacher = '$teacher' LIMIT 1";
    $sqlSheetRecord = mysqli_query($con, $querySheetRecord);
  }





?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATTENDANCE RECORD</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/attendance-record.css">

  <!-- script -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="./js/sidebar.js" defer></script>

</head>

<body>

  <div class="main">
    <div class="header">
      <i class="fa-solid fa-bars" id="bars"></i>
      <img src="./img/sjc_logo.png" alt="Saint Jude College" />
      <p>PHINMA SAINT JUDE COLLEGE</p>
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

    <div class="container2" id="container">

      <div>
        <span style="border-style:groove;border-width:1px;">Allow remove
          <input type="checkbox" id="toggleRemove" name="toggleRemove" onchange="toggleRemove()" value="true">
        </span>

      </div>



      <table style="margin-top:10px;">
        <tr>
          <th class="different">List of Students</th>
          <?php 
          $daysCount;
          if($sheetRecord = mysqli_fetch_array($sqlSheetRecord)){
            $daysCount = $sheetRecord['days'];
            $year = $sheetRecord['year'];
            $month = $sheetRecord['month'];
            $sheetID = $sheetRecord['id'];

            for($a=1; $a<=$daysCount;$a++){
              echo"<th>".$a."</th>";
            }
          }

          ?>

        </tr>

        <center>
          <?php
            echo "Month ".$month;
            echo " Year ".$year;
          ?>
        </center>
        <?php while($classListResult = mysqli_fetch_array($sqlClassList)) {//WHILE
          $studentID = $classListResult['students_id'];
          $studentFn = $classListResult['first_name'];
          $studentLn = $classListResult['last_name'];
          $section1 = $classListResult['section'];
          $subject1 = $classListResult['subject'];
          echo "<tr><td>".$studentLn. ', ' .$studentFn."</td>"; 
          
          //$select = "SELECT * FROM attendance WHERE students_id LIKE '$studentID%'";

          for($a=1;$a<=$daysCount;$a++){
            $select = "SELECT * FROM attendance WHERE sections = '$section1' AND subjects='$subject1' AND students_id = '$studentID' AND day = $a AND month = $month AND sheetID = $sheetID ";
            $sqlselect = mysqli_query($con, $select);

            if($row=mysqli_fetch_array($sqlselect)){//if0
              if($classListResult['students_id']==$row['students_id']){//if1
                if($row['Status']==1 && $row['day']==$a && $row['month']==$month && $row['subjects']==$subject1  ){//if2
                  $InputID = $studentID . $row['id'] ."_". $sheetID;
                  
                  echo"<td><form method=GET>";
                  
                  echo "<input type=button onclick=AttendStatus(this.id,this.name,this.value) name=".$row['id']." id=".$InputID."  style=font-weight:bold;color:white;background-color:#38E54D;height:25px;width:25px;border:none; value='P'  >";
                  echo "</form></td>";
                }//if2
                elseif($row['Status']==0 && $row['day']==$a){//elseif1
                  $InputID = $studentID . $row['id'] ."_". $sheetID;
                  
                  echo "<td><form method=GET>";

                  echo"<input type=button onclick=AttendStatus(this.id,this.name,this.value) id=".$InputID." name=" .$row['id']." value='A' style=font-weight:bold;color:white;background-color:#D2001A;height:25px;width:25px;border:none; />"; 
                  
                }//elseif1

              }//if1
              else{
              echo "<td><form method=GET>";

              echo "<input type=button onclick=AttendStatus(this.id,this.name,this.value)  id=".$studentID."_".$month."_".$a."_".$sheetID." name=".$studentFn." value=".$a." style=font-weight:bold;color:white;background-color:#D2D3C9;height:25px;width:25px;border:none; /></form></td>";
              }
            }//if0
            else{
              echo "<td><form method=GET>";

              echo "<input type=button onclick=AttendStatus(this.id,this.name,this.value)  id=".$studentID."_".$month."_".$a."_".$sheetID." name=".$studentFn." value=".$a." style=font-weight:bold;color:white;background-color:#D2D3C9;height:25px;width:25px;border:none; /></form></td>";
            }//ELSE
          }//FOR LOOP


        
          echo "<tr>";
        }//WHILE
        ?>
      </table>
    </div>

    <div id="Button" class="Button">
      <center>
        <button id="Records" onclick="openRecords()" disabled>Record Lists</button>
        <button id="Create" onclick="openCreate()">Create Record</button>
        <button onclick="listOfClass()">List of Class</button>
        <button id="Attendance1" onclick="openAttendance()">Attendance Record</button><br>

      </center>
      Teacher: <?php echo $teacher."<br>";?>
      Section: <?php echo $sections."<br>";?>
      Subject: <?php echo $subjects;?>

      <div class="DateClass" id="DateClass">
      </div>
    </div>





    <!--NEW SHEET-->
    <div class="container2" id="create">

      <form action="create_sheets.php" method="post" class="form-sheets">

        <!-- date -->
        <label for="Create records for whole year">Create records for whole year</label>
        <input type="checkbox" class="checkbox" id="checkbox1" name="wholeYear" onchange="toggleBox1()"
          value="true"><br>
        <label for="Use Current Date:">Use Current Date:</label>
        <input type="checkbox" class="checkbox" id="checkbox" name="useDateToday" onchange="toggleBox()"
          value="true"><br>
        <label for="Month:">Month:</label>
        <input type="number" id="month" name="month" max="12"><br>
        <label for="Year:">Year:</label>
        <input type="number" id="year" name="year"><br>

        <!-- section -->
        <label for="Section:">Section:</label>
        <select id="sections" name="sections" class="sections">
          <option value="<?php echo $_SESSION['sections']; ?>">
            <?php 
              echo $_SESSION['sections'];
            ?>
          </option>
        </select><br>

        <!-- subject -->
        <label for="Subject:">Subject:</label>
        <select id="subjects" name="subjects" class="subjects">
          <option value="<?php echo $_SESSION['subjects']; ?>">
            <?php 
              echo $_SESSION['subjects'];
            ?>
          </option>
        </select><br>

        <input type="submit" class="submit-sheets">
      </form>
    </div>



    <!--RECORDS-->
    <div class="container" id="records" style="height:300px;overflow: auto;">
      <table class="different">
        <form action="deleteRecord.php" method="POST">

          <div class="DeleteDiv" id="DeleteDiv"
            style="background-color:rgba(0, 255, 0,0.8);position:absolute;top:50%;left:50%;border: solid;border-color:rgba(0, 255, 0);display:none;">
            <input type="button" value="X" onclick="actions(this.value)"><br>



            <input type="submit" name="Delete" value="Delete" style="height:50px;width:100px;margin:20px;">
            <?php
          if($_SESSION['archive']=="no"){
          ?>
            <input type="submit" name="Archive" value="Archive" style="height:50px;width:100px;margin:20px;"><br>
            <?php 
          }
          elseif($_SESSION['archive']=="yes"){
            ?>
            <input type="submit" name="Archive2" value="Remove from Archive"
              style="height:50px;width:150px;margin:20px;"><br>
            <?php
          }
          ?>
            <input type="checkbox" onchange="checkAll()" id="checkbox3" name="selectAll" value="true">Select all
          </div>



          <?php 
          if($_SESSION['archive']=="yes"){
            $querySheetRecord1 = "SELECT * FROM sheet_record WHERE users_id='$usersId' AND sections='$sections' AND subjects = '$subjects' AND archive ='yes' ";
          echo "<tr ;>";
          echo "<td  style=height:50px; colspan=4><input type=submit name=CloseArchive value='Close Archive' style=height:30px;></td></tr>";

          }
          elseif($_SESSION['archive']=="no"){
            $querySheetRecord1 = "SELECT * FROM sheet_record WHERE users_id='$usersId' AND sections='$sections' AND subjects = '$subjects' AND archive ='no' ";
          echo "<tr>";
          echo "<td style=height:50px; colspan=4><input type=submit name=openArchive value='Open Archive' style=height:30px;></td></tr>";
            } 

        ?>
          <tr>
            <th>
              <input type="button" value="Action" onclick="actions(this.value)">

            </th>
            <th>Month</th>
            <th>Year</th>
            <th></th>
          </tr>

          <?php
            $sqlSheetRecord1 = mysqli_query($con, $querySheetRecord1);
            $a=0;
            while($sheetRecord1 = mysqli_fetch_array($sqlSheetRecord1)){
                      
              echo "<td style=width:5px;>"."<input class=foo id=".$a." name=".$a." type=checkbox value=".$sheetRecord1['id']."></td><td>".$sheetRecord1['month'];
              $a=$a+1;
              echo "</td><td>".$sheetRecord1['year'];
              echo "</td><td><a  href=attendance-record.php?ID=".$sheetRecord1['id'].">OPEN</a> ";
              echo "</td></tr>";
          
            }
            if($a == 0){//IF NO RECORDS CANT CLICK ATTENDANCE RECORD
              if($_SESSION['archive']=="yes"){
                echo "<tr><td style=height:200px; colspan=4>NO Archive</td></tr>";
              }
              else{
              ?>
          <tr>
            <td style="height:200px;" colspan="4">
              Please Create Record!!
            </td>
          </tr>
          <?php
              }
              ?>
          <script>
          document.getElementById("Attendance1").style.display = "none";
          </script>
          <?php
            }
          ?>
        </form>
      </table>

    </div>

    <br>
  </div>
</body>

</html>



<script type="text/javascript">
var allowRemove = "false";
var countRemove = 0;
var checkBox = document.getElementById("checkbox");
var checkBox1 = document.getElementById("checkbox1");
var month = document.getElementById("month");
var year = document.getElementById("year");
var div = document.getElementById("DeleteDiv");

function checkAll() {
  var checkboxes = document.getElementsByClassName("foo");

  if (checkbox3.checked == true) {

    for (var a = 0; a < checkboxes.length; a++) {

      checkboxes[a].checked = true;
    }
  } else if (checkbox3.checked == false) {
    for (var a = 0; a < checkboxes.length; a++) {

      checkboxes[a].checked = false;
    }
  }
}



function toggleBox1() {

  if (checkBox1.checked == true) {
    month.disabled = true;
    month.value = "";
  } else if (checkBox.checked == false) {
    month.disabled = false;
  }
}

function toggleBox() {

  if (checkBox.checked == true) {
    year.disabled = true;
    month.disabled = true;
    year.value = "";
    month.value = "";
  } else {
    year.disabled = false;
    if (checkBox1.checked == false) {
      month.disabled = false;
    }
  }
}

function toggleRemove() {
  var toggleBox = document.getElementById("toggleRemove");
  if (toggleBox.checked == true) {
    allowRemove = "true";
  } else {
    allowRemove = "false";
    if (countRemove >= 1) {
      alert("Webpage will restart after you delete");
      location.reload();
    }
  }
}


function openCreate() {

  document.getElementById("records").style.display = "none";
  document.getElementById("container").style.display = "none";
  document.getElementById("Create").disabled = true;
  document.getElementById("create").style.display = "block";
  div.style.display = "none";
  document.getElementById("Records").disabled = false;
  document.getElementById("Attendance1").disabled = false;
}

function openRecords() {
  document.getElementById("records").style.display = "block";
  document.getElementById("container").style.display = "none";
  document.getElementById("Records").disabled = true;
  document.getElementById("create").style.display = "none";
  div.style.display = "none";
  document.getElementById("Create").disabled = false;
  document.getElementById("Attendance1").disabled = false;
}

function openAttendance() {
  document.getElementById("records").style.display = "none";
  document.getElementById("container").style.display = "block";
  document.getElementById("Attendance1").disabled = true;
  document.getElementById("create").style.display = "none";
  div.style.display = "none";
  document.getElementById("Create").disabled = false;
  document.getElementById("Records").disabled = false;
}

function listOfClass() {
  open("listofclass.php", "_self");
}

function AttendStatus(id, name, value, ) { //UPDATE STATUS (ATTENDANCE STATUS)


  if (allowRemove == "false") {
    if (value == "P" || value == "A") { //CHECK IF VALUE IS PRESENT OR ABSENT
      $.ajax({
        url: "processData.php",
        method: 'get',
        data: {
          id,
          name,
          value
        },
        success: function(data) {
          console.log(data);
        }
      })

      if (value == "P") {
        var Element1 = document.getElementById(id);
        Element1.style.backgroundColor = "#D2001A";
        Element1.value = "A";
      } else if (value == "A") {
        var Element1 = document.getElementById(id);
        Element1.style.backgroundColor = "#38E54D";
        Element1.value = "P";
      }
    } else { //IF VALUE IS NOT PRESENT OR ABSENT, ADD NEW STATUS(PRESENT)

      var Element1 = document.getElementById(id);
      Element1.style.backgroundColor = "#B1AD25";
      Element1.disabled = true;
      $.ajax({
        url: "addData.php",
        method: 'get',
        data: {
          id,
          name,
          value
        },
        success: function(data) {
          console.log(data);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            document.getElementById(id).name = this.responseText;
          };
          xmlhttp.open("GET", "gethint.php?q=", true);
          xmlhttp.send();
        }
      })
      setTimeout(function() {
        Element1.style.backgroundColor = "#38E54D";
        Element1.value = "P";
        Element1.disabled = false;
      }, 500);
    }
  } else if (allowRemove == "true") { //DELETE ATTENDANCE
    if (value == "P" || value == "A") {
      var Element1 = document.getElementById(id);
      Element1.style.backgroundColor = "#B1AD25";
      Element1.disabled = true;
      $.ajax({
        url: "deleteData.php",
        method: 'get',
        data: {
          name
        },
        success: function(data) {
          console.log(data);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            document.getElementById(id).value = this.responseText;
          };
          xmlhttp.open("GET", "newButtonData.php?q=", true);
          xmlhttp.send();
        }
      })
      setTimeout(function() {
        countRemove = countRemove + 1;
        Element1.style.backgroundColor = "#D2D3C9";
        Element1.disabled = false;
      }, 500);
    } else {
      //alert("ERROR FKYOU")
    }
  }
}


//MAKE DIV MOVEABLE/DRAGGABLE

div.addEventListener('mousedown', function(e) {
  isDown = true;
  offset = [
    div.offsetLeft - e.clientX,
    div.offsetTop - e.clientY
  ];
}, true);

document.addEventListener('mouseup', function() {
  isDown = false;
}, true);

document.addEventListener('mousemove', function(event) {
  event.preventDefault();
  if (isDown) {
    mousePosition = {

      x: event.clientX,
      y: event.clientY

    };
    div.style.left = (mousePosition.x + offset[0]) + 'px';
    div.style.top = (mousePosition.y + offset[1]) + 'px';
  }
}, true);


function actions(action) {
  if (action == "Action") {
    div.style.display = "block";
  } else if (action == "X") {
    div.style.display = "none";
  }
}
</script>

<?php
  if(isset($_GET['ID'])){
    ?>
<script type="text/javascript">
document.getElementById("records").style.display = "none";
document.getElementById("container").style.display = "block";
document.getElementById("create").style.display = "none";
document.getElementById("Records").disabled = false;
document.getElementById("Attendance1").disabled = true;
</script>
<?php
}




?>