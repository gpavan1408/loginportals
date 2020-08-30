<?php

    require_once('connection.php');
    $username = $_POST['fid'];
    $pass = $_POST['fpass'];
    $sql = "select * from faculty";
    $result = $con->query($sql);
    $c = 0;
    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if($row["id"]==$username && $row["password"]==$pass)
            {
                $c = 1;
            }
        }
    }
    else{
        echo "Unable to Login due to technical error";
        sleep(2);
        echo "<script>window.location.href = 'index.html';</script>";
    }

    if($c)
    {
        session_start();
        $_SESSION['sid'] = $username;
        header("Location:facultyupdate.php");
    }
    else{
        echo "<script>
        alert('Invalid credentials');
        ";
        sleep(2);
         echo "
         window.location.href='index.html';
         </script>";
    }
?>
