<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/1_tabele.css">
    <title>Shop - user</title>
</head>
<body>
    <h3>Tabela user</h3>
    
    <?php
        //include_once './scripts/connect.php';
        require_once './scripts/connect.php';
        include './scripts/function.php';

        $sqlCity = "SELECT city.name as city, user.id, user.name, user.surname, user.birthday
        FROM city INNER JOIN user ON user.city_id = city.id";

        echo <<<TABLE
            <table>
                <tr>
                    <th>Id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Data Urodzenia</th>
                    <th>Rok Urodzenia</th>
                    <th>Miasto</th>
                </tr>
TABLE;
        if ($result = mysqli_query($conn, $sqlCity)){

            while($row = mysqli_fetch_assoc($result)){

                $year = year($row['birthday']);
                if($year == 0000){
                    $year = '-';
                }

                echo <<<DATA
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[surname]</td>
                    <td>$row[birthday]</td>
                    <td>$year</td>
                    <td>$row[city]</td>
                    <td><a href="./scripts/del_user.php?id=$row[id]">Usuń</a></td>
                </tr>
DATA;
                // echo '<tr>';
                // echo '<th>', $row['id'], '</th>';
                // echo '<th>', $row['name'], '</th>';
                // echo '<th>', $row['surname'], '</th>';
                // echo '<th>', $row['birthday'], '</th>';
                // echo '</tr>';
            }
        }
        echo "</table>";

        $cities = "SELECT * FROM city";

        if(isset($_GET['add_user'])){
        ?>
            <form action="./scripts/add_user.php" method="post">
                <input type="text" name="name" placeholder="Imię"><br>
                <input type="text" name="surname" placeholder="Nazwisko"><br>
                <input type="date" name="birthday">Data urodzenia<br>
                <select name="city">
                    <?php
                    $result = mysqli_query($conn, $cities);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value=\"$row[id]\>".$row['name']."</option>"; 
                    }

                    $dropdown .= "</select>";
                    echo "<h3>Dodawanie użytkownika</h3>";
                    ?>
                </select><br>
                <input type="submit" name="button"><br>
            </form>
        <?php
        }else{
            echo <<<H
            <h3>
                <a href="?add_user=">Dodaj użytkownika</a>
            </h3>
H;
        }
    ?>
</body>
</html>