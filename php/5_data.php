<?php
    echo date("Y-m-d"), '<br>';
    echo date("Y-F-d"), '<br>';
    echo date("H-i-s"), '<br>';

    echo "Dzień tygodnia:", date("w"),'<br>';
    echo "Numer tygodnia:", date("W"),'<br>';
    echo "Dzień roku:", date("z"),'<br>';

    $data = getdate();
    echo '<pre>';
        print_r($data);
    echo '</pre>';

    echo 'Dzień tygodnia: ', $data['weekday'];
    echo '<br>';

    $day = $data['wday'];

    switch ($day) {
        case '0':
            $day = 'niedziela';
            break;
        case '1':
            $day = 'poniedziałek';
            break;
        case '2':
            $day = 'wtorek';
            break;
    }

    echo 'Dzień tygodnia: ', $data['wday'], '<br>';

//znacznik czasu
    $y1 = 2020;
    $m1 = 4;
    $d1 = 21;

    $time1 = mktime(0,0,0, $m1, $d1, $y1);
    echo $time1;
?>