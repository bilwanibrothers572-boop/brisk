<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("location:login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<table class=" table>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="row">
      <div class="col">
        <?php include "./common/header.php";    ?>


        <h3>Students List</h3>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">

          <a class="btn btn-dark mx-1 btn-sm" href="add-new-student.php">Add new Student</a>
          <a class="btn btn-dark btn-sm" href="archive-students-list.php">Archive list</a>


        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">father_name</th>
              <th scope="col">gender</th>
              <th scope="col">dob</th>
              <th scope="col">address</th>
              <th scope="col">class</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php


            include "./common/db.php";

            $query = "SELECT * FROM `students` where status!='archive'";
            $result = mysqli_query($connection, $query);


             $rows = mysqli_num_rows($result);



             if ($rows == 0) {
              # code...
              echo '<tr><td colspan="6" class="text-center">No record found</td></tr>';
            } else {
              $serialno = 1;


            while ($row = mysqli_fetch_assoc($result)) {
              echo  '<tr>
              <th scope="row">' . $serialno . '</th>
      <th scope="row">' . $row["student_id"] . '</th>
      <td>' . $row["name"] . '</td>
      <td>' . $row['father_name'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['date_of_birth'] . '</td>
      <td>' . $row['address'] . '</td>
      <td>' . $row['class'] . '</td>
      <td><a href="./process/delete-student.php?id=' . $row["student_id"] . '" class="mx-1 btn btn-danger btn-sm">Delete</a><a href="./process/archive-student.php?id=' . $row["student_id"] . '" class="btn btn-dark btn-sm">Archive</a></td>
    </tr>';

     $serialno = $serialno + 1;
            }
            }

            ?>


          </tbody>
        </table>
      </div>
    </div>

  </div>


</body>

</html>