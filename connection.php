
<?php

    $con = mysqli_connect("login.conbvwtwrcn9.us-east-2.rds.amazonaws.com","loginportal","loginportal","fastenmedia");
    if ($con->connect_error) {
        die('Connect Error: ' . $con->connect_error);
    }

?>
