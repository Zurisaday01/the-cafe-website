<?php
    session_start();
    session_destroy();


    
    
    $conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
    
    // Check connection
    if($conn){ 
        
        $sql = "DELETE FROM cart";
        if(mysqli_query($conn, $sql)){
            header( "location:index.php");
        } else{
            echo "<script> alert('Something went wrong'); </script>";
        }
    }

?>