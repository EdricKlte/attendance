<?php
// database
require_once $_SERVER['DOCUMENT_ROOT'] . "/attendance/database/connect.php";

// session
require './php/session.php';

$queryAccounts = "SELECT * FROM users";
$sqlAccounts = mysqli_query($con, $queryAccounts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTER A TEACHER</title>

  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./css/register.css">

  <!-- script -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
  <script src="https://kit.fontawesome.com/8cbc2e0f0e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <script src="./js/sidebar.js" defer></script> -->
</head>

<body class="bg-body-tertiary">
  <?php include "./components/navbar.php" ?>

  <div class="container mt-5">
    <!-- error message -->
    <ul class="error_list"></ul>
    <!-- modal for add -->
    <form action="./php/register-create.php" method="post" id="addFaculty">
      <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Faculty</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter lastname">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter firstname">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="employeeno" class="form-label">Employee No</label>
                    <input type="text" name="employeeno" id="employeeno" class="form-control" placeholder="Enter employee no.">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <button class="__btn text-white rounded float-end" name="register">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="card p-5 shadow rounded">
          <div class="card-body">
            <div class="table-responsive">
              <button class="__btn text-white rounded" data-bs-toggle="modal" data-bs-target="#addModal">Add Faculty</button>
              <table class="table" id="myTable">
                <thead class="bg-primary" id="title">
                  <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Employee No</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      var dtable = $("#myTable").DataTable({
        "serverSide": true,
        "processing": true,
        "lengthChange": false,
        "ordering": false,
        "autoWidth": false,
        "ajax": "/attendance/admin/php/fetch-register-data.php",
        "rowCallback": function(row, data, index) {
          $(row).find("#deleteBtn").on("click", function() {
            // console.log("working")
          })
        }
      })

      $("#addFaculty").on("submit", function(e) {
        e.preventDefault();

        var formData = $(this).serialize()

        Swal.fire({
          title: 'Do you want to save the changes?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Save',
          denyButtonText: `Don't save`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              type: "post",
              url: "/attendance/admin/php/register-create.php",
              data: formData,
              dataType: "json",
              success: function(res) {
                if (res.status == 400) {
                  $(".error_list").html("")
                  $(".error_list").addClass("alert alert-danger")
                  $.each(res.error, function(key, err) {
                    $(".error_list").append(`
                  <li class='ms-3'>${err}</li>
                `)
                  })
                  $("#addModal").modal("hide")
                } else {
                  Swal.fire('Saved!', '', 'success')
                  $(".error_list").html("")
                  $(".error_list").removeClass("alert alert-danger")
                  $("#addFaculty").trigger("reset")
                  $("#addModal").modal("hide")
                  getData()
                }
              }
            })
          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })
      });

      function getData() {
        dtable.ajax.reload();
      }
    })
  </script>
</body>

</html>