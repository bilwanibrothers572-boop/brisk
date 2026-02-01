<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>teacher</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>





  <div class="container my-5">
    <div class="row">
      <div class="col">
        <?php include "./common/header.php";    ?>



        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
          <h3>Teachers List</h3>
          <a class="btn btn-dark" href="add-new-teacher.php">Add new teacher</a>

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
            </tr>
          </thead>
          <tbody>
            <?php


            include "./common/db.php";

            $query = "SELECT * FROM `teachers`";
            $result = mysqli_query($connection, $query);


            $rows = mysqli_num_rows($result);

            if ($rows == 0) {
              # code...
              echo '<tr><td colspan="6" class="text-center">No record found</td></tr>';
            } else {
              while ($row = mysqli_fetch_assoc($result)) {
                echo  '<tr>
      <th scope="row">' . $row["teacher_id"] . '</th>
      <td>' . $row["name"] . '</td>
      <td>' . $row['father_name'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['date_of_birth'] . '</td>
      <td>' . $row['address'] . '</td>
    </tr>';
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