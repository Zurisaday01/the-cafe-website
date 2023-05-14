<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        // establish connection again
        $conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
        $sql = "DELETE from cart where id=$id";  
        

        if(mysqli_query($conn, $sql)){
            header( "location:cart.php");
        } else {
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";
        }
    }

?>