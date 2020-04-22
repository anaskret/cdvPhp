<?php
    echo "CDV<br>";
    echo "CDV<br>";

    $name = 'Janusz';
    echo "Mam na imię: $name";
    echo "<br>Mam na imię: ".$name;
    echo "<br>Mam na imię: ",$name,"<br>";

    $dec = 100;
    $hex = 0xB;
    $oct = 021;
    $bin = 0b1010;

    echo $dec,"<br>", $hex,"<br>", $oct,"<br>", $bin;

//składnia heredoc

    $name = "Anna";
    $surname = "Nowak";
    
    echo <<<ETYKIETA
        <br>Dane użytkownika<br>
        Imię: $name<br>
        Nazwisko: $surname<hr>
ETYKIETA;

    $data = <<<SHOW
        New data<br>
SHOW;

    echo $data

//składnia nowdoc

//     $name = "Tadeusz";

//     echo <<< 'E'
//         Imię: $name<br>
// E;

?>