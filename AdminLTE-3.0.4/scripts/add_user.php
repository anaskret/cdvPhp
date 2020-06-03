<?php
    session_start();

    if(!empty($_POST['name']) && !empty($_POST['surname']) 
    && !empty($_POST['email1']) && !empty($_POST['email2']) 
    && !empty($_POST['pass1']) && !empty($_POST['pass2']) 
    && !empty($_POST['birthday']))
    {
        $error=0;

        if(!isset($_POST['terms'])){
            $error = 1;
            $_SESSION['error'] = 'Zaznacz regulamin';
        }

        if($_POST['pass1'] != $_POST['pass2']){
            $error = 1;
            $_SESSION['error'] = 'Hasła są różne';
        }

        if($_POST['email1'] != $_POST['email2']){
            $error = 1;
            $_SESSION['error'] = 'Maile są różne';
        }

        if($error != 0){
            ?>
            <script>
                history.back();
            </script>
            <?php 
            exit();
        }
        
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pass = $_POST['pass1'];
        $email = $_POST['email1'];
        $birthday = $_POST['birthday'];
        $city=1;

        require_once './connect.php';

        if($conn->connect_errno){
            $_SESSION['error'] = 'Awaria bazy danych!';
            exit();
        }

        $sql = "INSERT INTO `user` (`name`, `surname`, `pass`, `birthday`, `city_id`, `email`) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $surname, $pass, $birthday, $city, $email);

        if($stmt->execute()){
            $conn->close();
            $stmt->close();
            header('location: ../?register=success');
            //dokończyć wyświetlanie komunikatu po prawidłowym dodaniu użytkownika do bazy danych na stronie index.php
            exit();
        }
        else{
            //sprawdzenie czy istnieje w bazie email podany przez użytkownika

            $sql = "SELECT * FROM `user` WHERE `email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            if($conn->affected_rows){
                $_SESSION['error'] = 'Podany adres email istnieje w bazie dancyh';
            }
            else{
                $_SESSION['error'] = 'Nie dodano użytkownika do bazy danych';
            }    
        }

        $conn->close();
        $stmt->close();
        ?>
        <script>
            history.back();
        </script>
        <?php
    }
    else {
        $_SESSION['error'] = 'Wypełnij wszystkie pola!';
        // header('location:../pages/register.php');
        ?>
        <script>
            history.back();
        </script>
        <?php
    }
?>