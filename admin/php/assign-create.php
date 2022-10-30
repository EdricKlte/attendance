<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";
  require 'session.php';

  if (isset($_POST['submit'])) {
    $department = trim($_POST['departments']);
    $teachers = trim($_POST['teachers']);
    $sections = trim($_POST['sections']);
    $subjects = trim($_POST['subjects']);


    $queryAssignCreate = "INSERT INTO assign VALUES (null, '$department', '$teachers', '$sections', '$subjects' ) ";
    $sqlAssignCreate = mysqli_query($con, $queryAssignCreate);

    pathTo('assign');
  }