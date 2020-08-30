<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once('connection.php');
    $username = $_POST['sid'];
    $pass = $_POST['spass'];
    $sql = "select * from students";
    $result = $con->query($sql);
    $c = 0;
    if($result->num_rows>0)
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
        header("Location:studentdetails.php");
    }
    else{
        echo "<script>
        alert('Invalid credentials');</script>
        ";
        sleep(2);
         echo "
        window.location.href='index.html';
        </script>";
    }
?>
