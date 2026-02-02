// Count students
$student_query = "SELECT COUNT(*) AS total_students FROM students";
$student_result = mysqli_query($conn, $student_query);
$student_row = mysqli_fetch_assoc($student_result);
$total_students = $student_row['total_students'];

// Count teachers
$teacher_query = "SELECT COUNT(*) AS total_teachers FROM teachers";
$teacher_result = mysqli_query($conn, $teacher_query);
$teacher_row = mysqli_fetch_assoc($teacher_result);
$total_teachers = $teacher_row['total_teachers'];
?>