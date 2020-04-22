<?php
    $text =<<<TEXT
    CDV -
    Collegium
    Da
    Vinci<br>
TEXT;

    echo $text;
    echo nl2br($text);

    echo strtolower($text);     //Lower
    echo strtoupper($text);     //Upper
    echo ucfirst(strtolower(trim($text)));           
    echo ucwords(strtolower(trim($text)));  

    $lorem="Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, illo placeat necessitatibus consectetur aliquam impedit esse cupiditate eius neque officiis ad, aspernatur amet, minus at tempora dolor expedita vitae laborum? ";
    echo $lorem, "<br>";
    $col = wordwrap($lorem, 40, "<br>");
    echo $col;

    //usuwanie białych znaków

    $name = " Janusz  ";
    echo strlen($name);         //9
    echo strlen(ltrim($name));  //8
    echo strlen(rtrim($name));  //7
    echo strlen(trim($name));   //6

    //przeszukiwanie ciągu znaków
    $address = "Poznań, ul. Polna 10, tel. (00) 222 22 22";

    $find = strstr($address, 'tel');
    echo "<br>",$find;

    $find = stristr($address, 'Tel');
    echo "<br>",$find;
    
    $find = stristr($address, 'Tel', true);
    echo "<br>",$find;

    $surname = substr("Janusz Kowalski", 7, 5);
    echo $surname, '<br>';

    //przetwarzanie ciągów znaków
    $login = "BłaŻej";
    $censure = array("ą", "ć", "ę", "ł", "ń", "ó", "ś", "ź", "ż", "Ł", "Ż");
    $replace = array("a", "c", "e", "l", "n", "o", "s", "z", "z", "L", "Z");

    $validLogin = str_replace($censure, $replace, $login);

    echo "Dane przed poprawą: $login<br>";
    echo "Dane po poprawie: $validLogin<br>";
?>