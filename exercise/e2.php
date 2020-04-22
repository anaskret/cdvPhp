<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="Zdanie"><br>
        <input type="submit" value="Wyślij">
    </form>

    <?php
        $censure = array("czarny", "biały");
        $replace = "#***#";
        if(!empty($_POST['name'])){
            $validate = str_ireplace($censure, $replace, $_POST['name']);
            echo $validate;
        }
    ?>
</body>
</html>