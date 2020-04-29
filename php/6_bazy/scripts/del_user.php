<?php
    if($_GET['id']){
        $id = $_GET['id'];

        require_once "./connect.php";
        $sql = "DELETE FROM `user` WHERE `user`.`id` = $id";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);    
    }

    header('location: ../1_shop.php');
?>