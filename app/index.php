<?php

use AlterPhone\PhoneNumbers;

require 'vendor/autoload.php';

$symbols = ['jxb xvjafbepaxtca krgsbx ', "22266631339277717777", "66885551555","833998", "", "111", "000"];
$new = new PhoneNumbers();

//foreach ($symbols as $number){
//    var_dump(  $new->phoneWords($number));
//    echo "<br>";
//}

//var_dump(" ebswkfayrfbv jge mi" ==$new->phoneWords("033227777955333299977733322888011543306444033227777955333299977733322888011543306444") );
echo 'jxb xvjafbepaxtca krgsbx ';
echo "<br>";
echo $new->getResult("599220998885233322337299822220557774777722990");