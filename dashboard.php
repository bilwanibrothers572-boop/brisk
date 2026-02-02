<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        .dashboard {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }

        .card {
            width: 250px;
            padding: 20px;
            border-radius: 10px;
            background: #f4f6f8;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .card p {
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>Welcome</h1>

    <div class="dashboard"> <a href="students-list.php" style="text-decoration: none;">
            <div class="card">
                
                <?php 
                include "./common/db.php";
                $student_query = "SELECT COUNT(*) AS total_students FROM students";
                $student_result = mysqli_query($connection, $student_query);
$student_row = mysqli_fetch_assoc($student_result);
$total_students = $student_row['total_students'];
echo "<h2> $total_students Total Students</h2>";
                
                
                
                
                
                
                
                
                ?>
            </div>
        </a>

        <a href="teachers-list.php" style="text-decoration: none;">
            <div class="card">
                <?php 
                $teacher_query = "SELECT COUNT(*) AS total_teachers FROM teachers";
$teacher_result = mysqli_query($connection, $teacher_query);
$teacher_row = mysqli_fetch_assoc($teacher_result);
$total_teachers = $teacher_row['total_teachers'];
echo "<h2> $total_teachers Total Teachers</h2>";
                
                ?>
               
            </div>
        </a>
    </div>

</body>

</html>