 <?php
    include "../common/db.php";
    $student_id = $_GET['id'];

    $query = "Update teachers set status='archive' WHERE `teachers`.`teacher_id` = $teacher_id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        # code...
        // echo "Data is deleted !";
        header("location:../teachers-list.php");
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }