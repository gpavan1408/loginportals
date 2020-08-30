<?php
    
    require_once('connection.php');
    $username = $_POST['rid'];
    $pass = $_POST['rpass'];
    $sql = "select * from recruiters";
    $result = $con->query($sql);
    $c = 0;
    if($result->num_rows > 0)
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
        header("Location:recruiters.php");
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
