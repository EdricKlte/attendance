<?php
require 'ssp.class.php';

$dbDetails = array(
  'host' => 'localhost',
  'user' => 'root',
  'pass' => '',
  'db'   => 'attendance'
);

$table = "users";

$primaryKey = "id";

$columns = [
  ['db' => 'last_name', 'dt' => 0],
  ['db' => 'first_name', 'dt' => 1],
  ['db' => 'employee_no', 'dt' => 2],
  ['db' => 'email', 'dt' => 3],
  [
    'db' => 'id',
    'dt' => 4,
    'formatter' => function ($d, $row) {
      return "
      <div class='btn-group btn-group-sm'>
        <button class='btn btn-danger' id='deleteBtn'><i class='fa-solid fa-trash'></i></button>
      </div>
      ";
    }
  ]
];

echo json_encode(
  SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
