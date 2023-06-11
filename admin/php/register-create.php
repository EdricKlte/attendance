<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/attendance/database/connect.php";

$data = array(
  'lastname' => filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
  'firstname' => filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
  'employee_no' => filter_var($_POST['employeeno'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
  'email' => filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
  'password' => filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)
);

$error = array();

if (empty($data['lastname'])) {
  $error['lastname'] = 'Lastname is required';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else if (empty($data['firstname'])) {
  $error['firstname'] = 'Firstname is required';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else if (empty($data['email'])) {
  $error['email'] = 'Email is required';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else if (empty($data['employee_no'])) {
  $error['employee_no'] = 'Employee no is required';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else if (empty($data['password'])) {
  $error['password'] = 'Password is required';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else if ($data['password'] !== $_POST['password_confirmation']) {
  $error['confirm_password'] = 'Password does not match';

  $results = array(
    'status' => 400,
    'error' => $error
  );
} else {
  $dataFaculty = implode(" ', ' ", $data);
  $queryRegister = "INSERT INTO users VALUES (null, '$dataFaculty')";
  $sqlRegister = mysqli_query($con, $queryRegister);

  $results = array(
    'status' => 200,
    'data' => $sqlRegister,
  );
}

echo json_encode($results);
