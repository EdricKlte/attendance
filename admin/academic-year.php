<?php 
  require('./php/session.php');
  
  if(!empty($_GET)){
    $schoolyear = $_GET['year'];
    $schoolYEAR = explode("-",$schoolyear);

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Academic Year</title>

  <!-- css -->
  <link rel="stylesheet" href="./css/academic-year.css" />

  <!-- js -->
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  
  
</head>

<body>
  <div class="main">
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
        <a href="class-list-page.php">
          <li>Academic Year</li>
        </a>
        <form action="/attendance/admin/php/logout.php" method="post">
          <input type="submit" value="Logout" />
        </form>
      </ul>
    </div>

    <div class="container">
      
      
      <div class="MonthContainer" id="MonthContainer">
        First Sem<input type="checkbox" value="firstSem" id="firstSem" onchange="checkBOX(this.value)">     
          <br>
        Second Sem<input type="checkbox" value="secondSem" id="secondSem" onchange="checkBOX(this.value)">
        <center>
          
          
          Year<br>
          <input type="checkbox" value="<?php$schoolYEAR[0];?>" id="schoolYEAR1" onchange="checkBOX1(this.id)" >
          <?php echo $schoolYEAR[0]; ?><br>
          <input type="checkbox" value="<?php$schoolYEAR[1];?>" id="schoolYEAR2"onchange="checkBOX1(this.id)">
          <?php echo $schoolYEAR[1]; ?>
          <br>
          <button value="January" onclick="month(this.value)">January</button>
          <button value="February" onclick="month(this.value)">February</button>
          <button value="March" onclick="month(this.value)">March</button>
          <button value="April" onclick="month(this.value)">April</button>
          <button value="May" onclick="month(this.value)">May</button>
          <button value="June" onclick="month(this.value)">June</button><br>
          <button value="July" onclick="month(this.value)">July</button>
          <button value="August" onclick="month(this.value)">August</button>
          <button value="September" onclick="month(this.value)">September</button>
          <button value="October" onclick="month(this.value)">October</button>
          <button value="November" onclick="month(this.value)">November</button>
          <button value="December" onclick="month(this.value)">December</button>
        </center>
      
        <form method="post" action="php/add-academic-year.php?year=<?php echo $_GET['year']; ?>">
        
        <h3>Dates</h3>
        <div id="firstSemester">
        </div>
        <input type="submit">
        </form>
      </div>
    </div>
    </div>


    <div id="schoolYearID"><center>
      <form method="get" action="academic-year.php">
      Enter School Year(2011-2012)<input type="text" id="year" name="year" required>
      <input type="submit">
      </form>
    </center></div>
  </div>
</body>

</html>






<script type="text/javascript">
  function month(month1){
    var firstSEMbox = document.getElementById('firstSem');
    var secondSEMbox = document.getElementById('secondSem');
    var schoolYEAR1box = document.getElementById('schoolYEAR1');
    var schoolYEAR2box = document.getElementById('schoolYEAR2');
    var schoolYEAR;
    var semester;
    if(firstSEMbox.checked == true){
      semester = "firstSem";
    }
    else if(secondSEMbox.checked == true){
      semester = "secondSem";
    }

    if(schoolYEAR1box.checked == true){
      schoolYEAR = <?php echo $schoolYEAR[0]?>
    }
    else if(schoolYEAR2box.checked == true){
      schoolYEAR = <?php echo $schoolYEAR[1]?>
    }
    if(firstSEMbox.checked == true ||secondSEMbox.checked == true){
      if(schoolYEAR1box.checked == true || schoolYEAR2box.checked == true){
        var firstSem = document.getElementById('firstSemester');
        //var year = document.getElementById('firstSemyear').value;
        var months = document.createElement('input');

        var textcontext = month1 + "-" + schoolYEAR + ", " + semester;
        var text = document.createTextNode(textcontext);

        months.setAttribute("class","try");
        months.setAttribute("value",textcontext);
        months.setAttribute("id",month1);
        months.setAttribute("name",textcontext);
        months.appendChild(text);

        months.setAttribute("style",'width: 200px; height: 50px; cursor: pointer !important;');


        months.addEventListener('click',function remove(event){
          var id = document.getElementById(this.id);
          this.parentNode.removeChild(this);
        });
        firstSem.appendChild(months);
        }
        else{
          alert("Enter School Year");
        }
      }
    else{
      alert("Enter Semester");
    }
  }

  function checkBOX(box){
    var firstSem = document.getElementById('firstSem');
    var secondSem = document.getElementById('secondSem');
    if(box == "firstSem"){
        secondSem.checked = false;
    }
    else if(box == "secondSem"){
        firstSem.checked = false;
        //secondSem.checked = "false";
    }
  }
  function checkBOX1(box){
    var schoolYEAR1 = document.getElementById('schoolYEAR1');
    var schoolYEAR2 = document.getElementById('schoolYEAR2');
    if(box == "schoolYEAR1"){
        schoolYEAR2.checked = false;
    }
    else if(box == "schoolYEAR2"){
        schoolYEAR1.checked = false;
        
    }
  }




</script>

<?php
if(empty($_GET['year'])){
    ?>
    <script>
      document.getElementById("MonthContainer").style.display = "none";
    </script>
    <?php
  }
else{
  ?>
  <script>
    document.getElementById('schoolYearID').style.display = "none";
  </script>
  <?php
}
?>