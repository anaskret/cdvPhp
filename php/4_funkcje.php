<?php 
    function value($a){
        if($a < 0)
            return "ujemna";
        elseif($a > 0)
            return "dodatnia";
        else
            return "zero";
    }

    $x = value(0);
    echo $x;
    echo gettype($x);

    function getValue():int{
        return 10.55;
    }

    echo "<br>", getValue();

//zasięg zmiennych
    $x=10;
    function show(){
        echo "<br>Wartość zmiennej ", $GLOBALS['x'];
    }
    show();
    
    function show1(){
        global $x;
        echo "<br>Wartość zmiennej ", $x;
    }
    show1();
    echo "<hr>";

    function add(){
        static $num = 10;
        echo "\$num = $num<br>";
        $num += 10;
    }

    add();
    add();
    add();

//argumenty
    function add1($x, $y=1){
        return $x +$y;
    }

    $num = add1(1,2);
    echo $num, "<br>";

    $num = add1(3);
    echo $num, "<br>";

//argumenty i typy danych
    function multi(float $x, int $y){
        return $x * $y;
    }

    echo multi(3, 4);
    echo multi(3.5, 2);
    echo multi(2, 3.5);
    ?>