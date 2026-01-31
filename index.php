<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <?php include "./common/header.php";
        ?>

        <form class="row g-3 border p-3" method="post">

            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <h3>Add new student</h3>
                <a class="btn btn-dark" href="students-list.php">Students List</a>

            </div>

            <?php

            if (isset($_POST["btnSave"])) {



                $std_name =    $_POST["name"];
                $father_name = $_POST['fatherName'];
                $address = $_POST["address"];
                $city = $_POST["city"];
                $gender = $_POST['gender'];
                $zip = $_POST["zip"];
                $is_enrolled = $_POST["isEnrolled"];
                $dob = $_POST["dob"];


                // echo $std_name;

                // database connection



               include "./common/db.php";

                $query = "INSERT INTO `students`(`name`, `father_name`, `gender`, `address`,`zip`,`city`,`date_of_birth`) VALUES ('$std_name','$father_name','$gender','$address','$zip','$city','$dob');";


                $result = mysqli_query($connection, $query);

                if ($result) {
                    # code...
                    echo '<div class="alert alert-success">Data is saved</div>';
                } else {
                    echo "Something went wrong" . mysqli_error($connection);
                }
            }







            ?>







            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-4">
                <label for="fatherName" class="form-label">Father Name</label>

                <input type="text" class="form-control" id="fatherName" name="fatherName">
            </div>
            <div class="col-md-4">
                <label for="DOB" class="from-label">DOB</label>
                <input type="date" class="form-control" id="DOB" name="dob">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>

                <textarea name="address" id="address" class="form-control" name="address"></textarea>

            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city">
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-select" name="gender">
                    <option selected>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="isEnrolled">
                    <label class="form-check-label" for="gridCheck">
                        Children is enrolled
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark" name="btnSave">Save</button>
            </div>
        </form>


    </div>

</body>

</html>