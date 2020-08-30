<?php
    session_start();
    
      if(!isset($_SESSION['sid'])){
      
          header('Location:logout.php');    
        
      }
     
?>
