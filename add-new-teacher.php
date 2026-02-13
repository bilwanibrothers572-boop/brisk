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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <?php include "./common/header.php";
        ?>

        <form class="row g-3 border p-3" method="post">

            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <h3>Add new teacher</h3>
                <a class="btn btn-dark" href="teachers-list.php">Teachers List</a>

            </div>

            <?php


            if (isset($_POST["btnSave"])) {

                $name       = $_POST["name"];
                $fatherName = $_POST["fatherName"];
                $address    = $_POST["address"];
                $city       = $_POST["city"];
                $gender     = $_POST["gender"];
                $zip        = $_POST["zip"];
                $dob        = $_POST["dob"];
                $qualification = $_POST["qualification"];
                $contact  = $_POST["contact"];


                $errors = [];

                if ($name == "") {
                    $errors[] = "Name is required";
                }

                if ($fatherName == "") {
                    $errors[] = "Second name is required";
                }

                if ($gender == "") {
                    $errors[] = "Gender is required";
                }

                if ($city == "") {
                    $errors[] = "City is required";
                }

                if ($qualification == "") {
                    $errors[] = "Qualification is required";
                }

                if ($contact != "" && !preg_match("/^[0-9]{10,15}$/", $contact)) {
                    $errors[] = "Contact number must be 10–15 digits";
                }

                if ($zip != "" && !is_numeric($zip)) {
                    $errors[] = "Zip must be numeric";
                }

                /* 3️⃣ SHOW ERRORS (STOP INSERT) */
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">';
                    foreach ($errors as $error) {
                        echo "<div>$error</div>";
                    }
                    echo '</div>';
                } else {
                    include "./common/db.php";

                    $query = "
        INSERT INTO teachers
        (name, father_name, gender, address, zip, city, date_of_birth,qualification,contact)
        VALUES
        ('$name', '$fatherName', '$gender', '$address', '$zip', '$city', '$dob','$qualification','$contact')
    ";

                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        echo '<div class="alert alert-success">Data is saved</div>';
                    } else {
                        echo mysqli_error($connection);
                    }
                }
            }














            ?>







            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo   isset($name)?$name:"";   ?>">
            </div>
            <div class="col-md-4">
                <label for="fatherName" class="form-label">Second Name</label>

                <input type="text" class="form-control" id="fatherName" name="fatherName" value="<?php echo isset($fatherName)?$fatherName:"";?>">
            </div>
            <div class="col-md-4">
                <label for="DOB" class="from-label">DOB</label>
                <input type="date" class="form-control" id="DOB" name="dob">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>

                <textarea id="address" class="form-control" name="address"></textarea>


            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <select id="city" class="form-select" name="city">
                    <option value="">Choose...</option>

                    <option value="MUltan">bwp</option>
                    <option value="DGK">multan</option>
                </select>


            </div>

            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip">
            </div>

            <div class="col-md-4">
                <label for="qualification" class="form-label">qualification</label>
                <select id="qualification" class="form-select" name="qualification" required>
                    <option value="">Choose...</option>
                    <option value="intermediate" <?php echo (isset($qualification) && $qualification == 'intermediate') ? 'selected' : ''; ?>>intermediate</option>
                    <option value="graduate" <?php echo (isset($qualification) && $qualification == 'graduate') ? 'selected' : ''; ?>>graduate</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputcontact" class="form-label">contact</label>
                <input type="text" class="form-control" id="contact" name="contact">

            </div>



            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-select" name="gender">
                    <option value="">Choose...</option>

                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

            </div>



            <div class="col-12">
                <button type="submit" class="btn btn-dark" name="btnSave">Save</button>
            </div>
        </form>


    </div>

</body>

</html>