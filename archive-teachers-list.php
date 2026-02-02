<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<table class=" table>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">






</head>

<body>

  <div class="container my-5">
    <div class="row">
      <div class="col">
        <?php include "./common/header.php";    ?>
        <h3>Archive Teachers List</h3>
        <a class="btn btn-dark" href="add-new-teacher.php" style="float: right;">Add new Teacher</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">firstname</th>
              <th scope="col">lastname</th>
              <th scope="col">gender</th>
              <th scope="col">dob</th>
              <th scope="col">address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php


            include "./common/db.php";

            $query = "SELECT * FROM `teachers` where status='archive'";
            $result = mysqli_query($connection, $query);


            while ($row = mysqli_fetch_assoc($result)) {
              echo  '<tr>
      <th scope="row">' . $row["student_id"] . '</th>
      <td>' . $row["name"] . '</td>
      <td>' . $row['father_name'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['date_of_birth'] . '</td>
      <td>' . $row['address'] . '</td>
      <td><a href="./process/delete-teacher.php?id=' . $row["teacher_id"] . '" class="btn btn-danger btn-sm">Delete</a><a href="./process/unarchive-teacher.php?id=' . $row["teacher_id"] . '" class="mx-1 btn btn-dark btn-sm">Unarchive</a></td>
    </td>
    </tr>';
            }

            ?>


          </tbody>
        </table>
      </div>
    </div>

  </div>


</body>

</html>