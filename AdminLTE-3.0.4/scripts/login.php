<?php
    session_start();
    if(!empty($_POST['email']) && !empty($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        require_once './connect.php';

        //sprawdzenie czy istnieje w bazie email podany przez usera
        $sql = "SELECT * FROM `user` WHERE `email` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt -> get_result();
        $error = 0;
        
        if($result->num_rows == 1){
            //adres istnieje w bazie
            $user = $result->fetch_assoc();
            //echo $user['pass'];
            if(password_verify($pass, $user['pass'])){
                switch($user['status_id']){
                    case 1:
                        echo 'aktywny';
                    break;
                }

                header('location: ../pages/logger/admin/php');
                exit();
            }
            else{
                $error = 1;
                echo 'passerror';
                $_SESSION['error'] = 'Błędny email lub hasło!';
            }
        }
        else{
            $error = 1;
            $_SESSION['error'] = 'Błędny email lub hasło!';
        }

        if($error != 0){
            ?>
            <script>
                history.back();
            </script>
            <?php
            exit();
        }
        
        echo 'test';
    }
    else{
        $_SESSION['error'] = 'Wypełnij wszystkie pola!';
            echo 'errooooor';
            ?>
            <script>
                history.back();
            </script>
            <?php
    }
?>