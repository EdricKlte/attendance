<?php 
  // database
  require_once $_SERVER['DOCUMENT_ROOT']."/attendance/database/connect.php";

  session_start();
  $usersId = $_SESSION['id']; 
  $year = date("Y");
  $month = date("m");
  $dateModified = $month."/".$year;
  //$section = $_SESSION['sections'];
  //$subject = $_SESSION['subjects'];
  if (isset($_POST['import'])) {
    // allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // validate whether the selected file is a csv file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes )) {

      // if the file is uploaded
      if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        // open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

        // skip the first line
        fgetcsv($csvFile);

        // parse data from CSV file line by line
        while(($line = fgetcsv($csvFile)) !== FALSE) {
          // get row data
          $students_id = $line[0];
          $last_name = $line[1];
          $first_name = $line[2];
          $course = $line[3];
          $section = $line[4];
          $subject = $line[5];
          // check whether students is already assigned in section/subject in the database with the same student no.
          $prevQuery = "SELECT * FROM class_list WHERE students_id = '$line[0]' AND section = '$section' AND subject = '$subject' ";
          $prevResult = $con->query($prevQuery);

          if ($prevResult->num_rows > 0) {
            // update member data in the database
            $con->query("UPDATE class_list SET last_name = '".$last_name."', first_name = '".$first_name."', course = '".$course."', section = '".$section."', subject = '".$subject."',users_id ='".$usersId."', dateModified = '".$dateModified."' WHERE students_id = '".$students_id."' ");
          } else {
            // insert class list in the database
            $con->query("INSERT INTO class_list (students_id, last_name, first_name, course, section, subject, users_id, dateModified) VALUES ('".$students_id."', '".$last_name."', '".$first_name."', '".$course."', '".$section."', '".$subject."','".$usersId."','".$dateModified."' ) ");
          }
        }

        // close opened CSV File
        fclose($csvFile);

        $qstring = '?status=succ';
      } else {
        $qstring = '?status=err';
      }
    } else {
      $qstring = '?status=invalid_file';
    }
  }

  // redirect to the page
  header("Location: /attendance/teachers/class-list.php".$qstring);