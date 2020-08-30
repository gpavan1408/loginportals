<?php

    require_once('checksession.php');
    require_once('connection.php');
    if(isset($_SESSION['sid'])){
        $stuid = $_POST['sid'];
        
        $sql = "select * from students where id='".$stuid."'";
        $result = $con->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()){
                echo '
                {
                    "valid":"1",
                    "data":{
                        "id":"'.$row["id"].'",
                        "first_name":"'.$row["firstname"].'",
                        "last_name":"'.$row["lastname"].'",
                        "email":"'.$row["email"].'",
                        "phone":"'.$row["phone"].'",
                        "department":"'.$row["dept"].'",
                        "year":"'.$row["year"].'",
                        "percentage":"'.$row["perc"].'"
                        

                    }
                }';
            }
        }
        else{
            echo '
            {
                "valid":"0"
            }';
        }
    }
    else{
        echo '
        {
            "valid":"2"
        }';
    }
    $con->close();
?>