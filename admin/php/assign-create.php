<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  require 'session.php';

  if (isset($_POST['submit'])) {
    $department = $_POST['departments'];
    $teachers = $_POST['teachers'];
    $sections = $_POST['sections'];
    $subjects = $_POST['subjects'];


    $queryAssignCreate = "INSERT INTO assign VALUES (null, '$department', '$teachers', '$sections', '$subjects' ) ";
    $sqlAssignCreate = mysqli_query($con, $queryAssignCreate);

    pathTo('assign');
  }