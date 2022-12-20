<?php

namespace AlterPhone;

class PhoneNumbers
{

    public array $keypad;
    public array $resultedString;

    public function __construct()
    {
        $this->keypad = include "phoneKeypad.php";

    }

    public function getResult($number): string
    {
        $mappedArray = $this->convertToArray($number);
        $this->resultedString = $this->getNumbers($mappedArray);
        return implode('', $this->resultedString);
    }

    public function __toString(): string
    {
        return implode('', $this->resultedString);
    }


    public function convertToArray($number): array
    {
        preg_match_all('/(.)(?=\\1)\\1+|\\d/', $number, $matches);
        $callback = fn(string $k, string $v) => array("length" => (strlen($v) - 1), "value" => $v[0]);
//        echo "<pre>";
//        print_r($matches);
//        echo "<pre>";
        return array_map($callback, array_keys($matches[0]), array_values($matches[0]));
    }


    public function getNumbers($arrayOfNumbers): array
    {
        $result = [];
        foreach ($arrayOfNumbers as $resultRow) {


            $phoneRow = $this->keypad[$resultRow['value']];
            if (count($phoneRow) > 3) {
                $r = $resultRow['length'] % 4;
                for ($i = 0; $i <= $resultRow['length']; $i += 4) {
                    $result[] = $this->keypad[$resultRow['value']][$r];
                }
            } else {
                if ($resultRow['length'] >= 3) {
                    var_dump($resultRow['length']);
                    $r = $resultRow['length'] % 3;
                    for ($i = 0; $i <= $resultRow['length']; $i += 3) {
                        $result[] = $this->keypad[$resultRow['value']][$r +1];
                    }
                } else {
                    if (!isset($this->keypad[$resultRow['value']][$resultRow['length']]) && $resultRow['value'] == 0) {
                        $result[] = str_repeat(" ", $resultRow['length'] + 1);

//                    }elseif ($resultRow['value'] == 1){
//                        echo "***";
//                        continue;
                    } else {

                        $result[] = ($this->keypad[$resultRow['value']][$resultRow['length']]);
                    }
                }
            }
        }

        return $result;
    }


    function phoneWords($str)
    {
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
        preg_match_all('/(.)(?=\\1)\\1+|\\d/', $str, $matches);
        $callback = fn(string $k, string $v) => array("length" => (strlen($v) - 1), "value" => $v[0]);
        $resultArray = array_map($callback, array_keys($matches[0]), array_values($matches[0]));
        $result = [];
        foreach ($resultArray as $resultRow) {
            $phoneRow = $arr[$resultRow['value']];
            if (count($phoneRow) > 3) {
                $r = $resultRow['length'] % 4;
                for ($i = 0; $i <= $resultRow['length']; $i += 4) {
                    $result[] = $arr[$resultRow['value']][$r];
                }
            } else {
                if ($resultRow['length'] > 3) {
                    $r = $resultRow['length'] % 4;
                    for ($i = 0; $i <= $resultRow['length']; $i += 3) {
                        $result[] = $arr[$resultRow['value']][$r + 1];
                    }
                } else {
                    if (!isset($arr[$resultRow['value']][$resultRow['length']]) && $resultRow['value'] == 0) {
                        $result[] = str_repeat(" ", $resultRow['length'] + 1);
                    } else {
                        $result[] = @($arr[$resultRow['value']][$resultRow['length']]);
                    }
                }
            }
        }

        return implode('', $result);
    }

}