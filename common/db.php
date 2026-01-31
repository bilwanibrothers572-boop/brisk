<?php
 define("HOST", "localhost");
                define("USER", "root");
                define("PASSWORD", "");
                define("DB", "school");


                $connection = mysqli_connect(HOST, USER, PASSWORD, DB);
                if (!$connection) {
                    # code...
                    die("Failed to connect");
                }


?>