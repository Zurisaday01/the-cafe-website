<?php require_once('header.php'); ?>

<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        // establish connection again
        $conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
        $sql = "DELETE from orders where id=$id";  
        

        if(mysqli_query($conn, $sql)){
            header( "location:order.php");
        } else {
            die(mysqli_error($conn));
        }
    }

?>