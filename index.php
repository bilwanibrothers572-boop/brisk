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
  <title>dashboard</title>
  <?php
  include "./common/css.php";
  include "./common/js.php";
  ?>
</head>

<body>
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <?php include "./common/header.php";
        include "./dashboard.php";
        ?>
      </div>
    </div>

  </div>
</body>
</html>