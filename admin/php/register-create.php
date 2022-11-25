<?php 
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  function pathTo($destination) {
    echo "<script>window.location.href = '/attendance/admin/$destination.php'</script>";
  }
  
  if (isset($_POST['register'])) {
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $employeeNo = $_POST['employeeNo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordEncrypt = md5($password);

    $queryRegister = "INSERT INTO users VALUES (null, '$lastName', '$firstName', '$employeeNo', '$email' ,'$passwordEncrypt')";
    $sqlRegister = mysqli_query($con, $queryRegister);

    pathTo('register');
  }


?>