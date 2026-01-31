<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<table class=" table">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">






</head>

<body>
  
<div class="container my-5">
  <div class="row">
    <div class="col">
      <?php  include "./common/header.php";    ?>
      <h3>Students List</h3>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">father_name</th>
        <th scope="col">gender</th>
        <th scope="col">dob</th>
        <th scope="col">address</th>
      </tr>
    </thead>
    <tbody>
      <?php
    
    
               include "./common/db.php";

      $query = "SELECT * FROM `students`";
      $result = mysqli_query($connection, $query);


      while ($row = mysqli_fetch_assoc($result)) {
        echo  '<tr>
      <th scope="row">' . $row["student_id"] . '</th>
      <td>' . $row["name"] . '</td>
      <td>' . $row['father_name'] . '</td>
      <td>' . $row['gender'] . '</td>
      <td>' . $row['date_of_birth'] . '</td>
      <td>' . $row['address'] . '</td>
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