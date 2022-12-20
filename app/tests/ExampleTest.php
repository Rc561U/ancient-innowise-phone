<?php

use AlterPhone\PhoneNumbers;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public PhoneNumbers $object;
    public function setUp(): void
    {
        $this->object = new PhoneNumbers();
    }

    public function testSample() {
        $this->assertSame("hello how are you", $this->object->getResult("443355555566604466690277733099966688"));
        $this->assertSame("kata", $this->object->getResult("55282"));
        $this->assertSame("im a tester", $this->object->getResult("44460208337777833777"));
        $this->assertSame("codewars", $this->object->getResult("22266631339277717777"));
        $this->assertSame("null", $this->object->getResult("66885551555"));
        $this->assertSame("text", $this->object->getResult("833998"));
        $this->assertSame("   ", $this->object->getResult("000"));
        $this->assertSame("php", $this->object->getResult("7447"));
        $this->assertSame("kumite", $this->object->getResult("55886444833"));
        $this->assertSame("rasmus", $this->object->getResult("777277776887777"));
        $this->assertSame("apple", $this->object->getResult("271755533"));
        $this->assertSame("", $this->object->getResult(""));
//        $this->assertSame("", $this->object->getResult("111"));
    }

    public function testWords() {
        $this->assertSame("hello how are you", $this->object->phoneWords("443355555566604466690277733099966688"));
        $this->assertSame("kata", $this->object->phoneWords("55282"));
        $this->assertSame("im a tester", $this->object->phoneWords("44460208337777833777"));
        $this->assertSame("codewars", $this->object->phoneWords("22266631339277717777"));
        $this->assertSame("null", $this->object->phoneWords("66885551555"));
        $this->assertSame("text", $this->object->phoneWords("833998"));
        $this->assertSame("    ", $this->object->phoneWords("0000"));
        $this->assertSame("php", $this->object->phoneWords("7447"));
        $this->assertSame("kumite", $this->object->phoneWords("55886444833"));
        $this->assertSame("rasmus", $this->object->phoneWords("777277776887777"));
        $this->assertSame("apple", $this->object->phoneWords("271755533"));
        $this->assertSame("", $this->object->phoneWords(""));
        $this->assertSame("   ", $this->object->phoneWords("111000"));
    }

    public function testRandom() {
        for ($i = 0; $i < 100; $i++) {
            $randomString = $this->getRandomString();
            $expected = $this->mySolution($randomString);

            echo $randomString;

            $this->assertEquals($expected, $this->object->getResult($randomString));
        }
    }

    public function getRandomString() {
        $randArr = explode(" ", "0 0 0 1 1 1 2 2 22 222 3 33 33 33 333 4 44 444 5 55 555 6 66 666 7 77 777 7777 8 8 88 888 9 99 999 9999");
        $stringLen = random_int(15, 40);

        $randomString = "";
        for ($i=0; $i < $stringLen; $i++) {
            $randomString .= $randArr[random_int(0, count($randArr)-1)];
        }

        return $randomString;
    }

    public function mySolution($str) {
        if ($str === "") return "";
        $toReplace = array('222'=>"c","22"=>"b","2"=>"a","333"=>"f","33"=>"e","3"=>"d","444"=>"i","44"=>"h",
            "4"=>"g","555"=>"l","55"=>"k","5"=>"j","666"=>"o","66"=>"n","6"=>"m","7777"=>"s",
            "777"=>"r","77"=>"q","7"=>"p","888"=>"v","88"=>"u","8"=>"t","9999"=>"z","999"=>"y",
            "99"=>"x","9"=>"w","0"=>" ","1"=>"");
        foreach ($toReplace as $needle => $better_needle) {
            $str = str_replace($needle, $better_needle, $str);
        }
        return $str;
    }

    public function tearDown(): void
    {

    }
}