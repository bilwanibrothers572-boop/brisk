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
  <title>teacher</title>
  <?php
  include "./common/css.php";
  include "./common/js.php";
  ?>
</head>

<body>





  <div class="container my-5">
    <div class="row">
      <div class="col">
        <?php include "./common/header.php";    ?>
        <h3>Teachers List</h3>



        <div class="d-grid gap-2 d-md-flex justify-content-md-end">


          <a class="btn btn-dark btn-sm" href="add-new-teacher.php">Add new teacher</a>
          <a class="btn btn-dark btn-sm" href="archive-teachers-list.php">Archive list</a>

        </div>


        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">firstname</th>
              <th scope="col">lastname</th>
              <th scope="col">gender</th>
              <th scope="col">dob</th>
              <th scope="col">address</th>
              <th scope="col">Qualification</th>
              <th scope="col">contact no</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php


            include "./common/db.php";

            $query = "SELECT * FROM `teachers` WHERE status = 'active'";


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
      <td>' . $row["name"] . '</td>
      <td>' . $row['father_name'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['date_of_birth'] . '</td>
      <td>' . $row['address'] . '</td>
      <td>' . $row['qualification'] . '</td>
      <td>' . $row['contact'] . '</td>
      <td><a href="./process/delete-teacher.php?id=' . $row['teacher_id'] . '" class="btn btn-danger btn-sm"> Delete </a> </td>
      <td><a href="./process/archive-teachers.php?id=' . $row['teacher_id'] . '" class="btn btn-dark btn-sm"> Archive </a> </td>
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