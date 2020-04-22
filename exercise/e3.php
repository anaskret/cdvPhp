<html>
    <body>
        <form method = POST>
            <input type="number" name="day" placeholder="Day">
            <input type="number" name="month" placeholder="Month">
            <input type="number" name="year" placeholder="Year">
            <input type="submit" value="Send">
        </form>
    </body>
</html>

<?php
    $y = $_POST['year'];
    $m = $_POST['month'];
    $d = $_POST['day'];
    $time = mktime(0, 0, 0, $m, $d, $y); 
    $hours = ($time/60)/60;
    $days = intval($hours/24);
    $years = intval($days/365);

    $text =<<<TEXT
    Seconds: $time <br>
    Hours: $hours <br>
    Days: $days <br>
    Years: $years <br>
TEXT;
        echo $text;
?>