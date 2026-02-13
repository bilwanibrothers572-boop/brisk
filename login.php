<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php

        if (isset($_POST["btnLogin"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (empty($email) || empty($password)) {
                echo '<div class="alert alert-danger" role="alert">Email and password fields are required.</div>';
            }else{
                include "./common/db.php";
$hashpassword = md5($password);
                $query='SELECT * FROM `users` WHERE email="'.$email.'" and password="'.$hashpassword.'";';
               $result= mysqli_query($connection,$query);
               if (mysqli_num_rows($result)>0) {
                        $user=mysqli_fetch_assoc($result);
                        $_SESSION["user"]=$user;
                        header("location:index.php");
               } else{
                echo '<div class="alert alert-danger" role="alert">Email or password is wrong ! </div>';
                
               }
               
               
            }
        }



        ?>



        <form method="POST">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                <a class="forgotpassword" href="forget-password.php">Forgot password?</a>
            </div>

            <button type="submit" name="btnLogin">Login</button>

            <p class="signup">
                Don’t have an account? <a href="#">Sign up</a>
            </p>
        </form>
    </div>

</body>

</html>