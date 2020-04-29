<?php
    if(!empty($_GET['name']) && !empty($_GET['surname']) && !empty($_GET['birthday']) && !empty($_GET['city'])){
        echo 'ok';
        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $birthday = $_GET['birthday'];
        $cityId = $_GET['city'];
        require_once "./connect.php";
        $sql = "INSERT INTO user (name, surname, birthday, city_id) VALUES ('$name', '$surname', '$birthday', $cityid);";

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);    
    }else{
        header('location: ../1_shop.php');
    }

?>