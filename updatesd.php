<?php

    require_once('checksession.php');
    require_once('connection.php');

    
    $sid = $_SESSION['sid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $percentage = $_POST['percentage'];

    $sql = "update students set firstname='".$firstname."', lastname='".$lastname."', email='".$email."', phone='".$phone."', dept='".$department."', year='".$year."', perc='".$percentage."' where id='".$sid."'";
    $result = $con->query($sql);
    echo $result;
    if ($result === TRUE) {
        echo "<script>
        alert('Application submitted successfully');
        window.location.href = 'studentdetails.php';
    </script>";
    } else {
        echo "Error updating record: " . $con->error;
         echo "<script>
             alert('There was a technical issue in submitting the application');
             window.location.href = 'studentdetails.php';
         </script>";
    }
    
    $con->close();
?>
