<?php

function phoneWords(string $str): string
{
    if(empty($str))return '';
    $nowNumber = $str[0];
    $result = '';
    $strArray = str_split($str);
    $count = -1;
    foreach($strArray as $key=>$number){
        if($number != $nowNumber || ($nowNumber!='1' && $count == count($arr[$nowNumber])-1)) {
            if($nowNumber!='1')
                $result.=$arr[$nowNumber][$count];
            $nowNumber = $number;
            $count = 0;
        }
        else $count++;
        if($nowNumber!='1' && $key == count($strArray)-1) $result.=$arr[$nowNumber][$count];
    }
    return $result;
}
$arr = [
    '0'=>[' '],
    '1'=> [''],
    '2'=>['a','b','c'],
    '3'=>['d','e','f'],
    '4'=>['g','h','i'],
    '5'=>['j','k','l'],
    '6'=>['m','n','o'],
    '7'=>['p','q','r','s'],
    '8'=>['t','u','v'],
    '9'=>['w','x','y','z'],
];

function phoneWordsTwo($str) {
    global $arr;
    preg_match_all('/(.)(?=\\1)\\1+|\\d/', $str, $matches);
    $callback = fn(string $k, string $v) => array("length" => (strlen($v)-1), "value" => $v[0]);
    $resultArray = array_map($callback, array_keys($matches[0]), array_values($matches[0]));
    $result = [];
    foreach ($resultArray as $resultRow){
        $phoneRow = $arr[$resultRow['value']];
        if (count($phoneRow) > 3){
            $r = $resultRow['length'] % 4 ;
            for ($i=0; $i <= $resultRow['length']; $i+=4){
                $result[] =  $arr[$resultRow['value']][$r] ;
            }
        } else {
            if ($resultRow['length'] > 3) {
                $r = $resultRow['length'] % 4;
                for ($i = 0; $i <= $resultRow['length']; $i += 3) {
                    $result[] = $arr[$resultRow['value']][$r+1];
                }
            } else {
                $result[] = @($arr[$resultRow['value']][$resultRow['length']]);
            }
        }
        echo "<pre>";
    }

    return implode('',$result);
}

$symbols = ["443355555566604466690277733099966688", "22266631339277717777", "66885551555","833998", "", "111"];
foreach ($symbols as $number){
    var_dump(phoneWordsTwo($number));
}



