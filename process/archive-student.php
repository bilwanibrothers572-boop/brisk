 <?php
    include "../common/db.php";
    $student_id = $_GET['id'];

    $query = "Update students set status='archive' WHERE `students`.`student_id` = $student_id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        # code...
        // echo "Data is deleted !";
        header("location:../students-list.php");
    } else {
        echo "Something went wrong" . mysqli_error($connection);
    }
?>