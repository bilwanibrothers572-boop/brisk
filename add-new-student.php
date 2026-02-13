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
    <title>Students Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <?php include "./common/header.php"; ?>

        <form class="row g-3 border p-3" method="post">
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                <h3>Add new student</h3>
                <a class="btn btn-dark" href="students-list.php">Students List</a>
            </div>

            <?php
            $dobError = "";
            
            if (isset($_POST["btnSave"])) {
                $std_name = $_POST["name"];
                $father_name = $_POST['fatherName'];
                $address = $_POST["address"];
                $city = $_POST["city"];
                $gender = $_POST['gender'];
                $zip = $_POST["zip"];
                $is_enrolled = $_POST["isEnrolled"];
                $dob = $_POST["dob"];
                $class = $_POST["class"];
                
                // DOB Validation
                $today = date('Y-m-d');
                
                if ($dob > $today) {
                    $dobError = "❌ Date of birth cannot be in the future";
                } else {
                    $birthDate = new DateTime($dob);
                    $currentDate = new DateTime($today);
                    $age = $currentDate->diff($birthDate)->y;
                    
                    if ($age < 5) {
                        $dobError = "❌ Student must be at least 5 years old";
                    } elseif ($age > 25) {
                        $dobError = "❌ Student cannot be older than 25 years";
                    }
                }
                
                // If no error, save to database
                if (empty($dobError)) {
                    include "./common/db.php";
                    
                    $query = "INSERT INTO `students`(`name`, `father_name`, `gender`, `address`,`zip`,`city`,`date_of_birth`,`class`) VALUES ('$std_name','$father_name','$gender','$address','$zip','$city','$dob','$class');";
                    
                    $result = mysqli_query($connection, $query);
                    
                    if ($result) {
                        echo '<div class="alert alert-success">Data is saved</div>';
                        // Clear form after successful save
                        $std_name = $father_name = $address = $city = $gender = $zip = $dob = $class = "";
                    } else {
                        echo '<div class="alert alert-danger">Something went wrong: ' . mysqli_error($connection) . '</div>';
                    }
                } else {
                    // Show error message
                    echo '<div class="alert alert-danger">' . $dobError . '</div>';
                }
            }
            ?>

            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($std_name) ? $std_name : ''; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="fatherName" class="form-label">Father Name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName"  required>
            </div>
            <div class="col-md-4">
                <label for="DOB" class="form-label">DOB</label>
                <input type="date" class="form-control <?php echo !empty($dobError) ? 'is-invalid' : ''; ?>" id="DOB" name="dob" value="<?php echo isset($dob) ? $dob : ''; ?>" max="<?php echo date('Y-m-d'); ?>" required>
                <?php if (!empty($dobError)): ?>
                    <div class="invalid-feedback"><?php echo $dobError; ?></div>
                <?php endif; ?>
                <small class="text-muted">Student must be between 5 and 25 years old</small>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" required><?php echo isset($address) ? $address : ''; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo isset($city) ? $city : ''; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-select" name="gender" required>
                    <option value="">Choose...</option>
                    <option value="male" <?php echo (isset($gender) && $gender == 'male') ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo (isset($gender) && $gender == 'female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zip" value="<?php echo isset($zip) ? $zip : ''; ?>" required>
            </div>

             <div class="col-md-4">
                <label for="class" class="form-label">Class</label>
                <select id="class" class="form-select" name="class" required>
                    <option value="">Choose...</option>
                    <option value="one" <?php echo (isset($class) && $class == 'one') ? 'selected' : ''; ?>>one</option>
                    <option value="two" <?php echo (isset($class) && $class == 'two') ? 'selected' : ''; ?>>two</option>
                </select>
            </div>
             
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="isEnrolled" <?php echo (isset($is_enrolled) && $is_enrolled == 'on') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="gridCheck">
                        Child is enrolled
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