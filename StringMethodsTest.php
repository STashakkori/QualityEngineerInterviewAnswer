<?php

require_once('StringMethods.php');

class StringMethodsTest extends PHPUnit_Framework_TestCase
{
    protected $stringmethods;

    function setUp()
    {
        $this->stringmethods = new StringMethods();
    }

    function tearDown()
    {
        unset($this->stringmethods);
    }

    function test_IndexOf()
    {
        // Test null case
        $test_index = $this->stringmethods->indexOf(NULL);
        $this->assertEquals(-1, $test_index);

        // Test single character at the beginning
        $test_index = $this->stringmethods->indexOf(array('t'));
        $this->assertEquals(0, $test_index);

        // Test single character in the middle
        $test_index = $this->stringmethods->indexOf(array('h'));
        $this->assertEquals(1, $test_index);

        // Test string that is too large of an input
        $test_index = $this->stringmethods->indexOf(array('t','h','i','s','i','s','a','t','e','s','t','s','t','r','i','n','g'));
        $this->assertEquals(-1, $test_index);

        // Test string that is not too large but does not occur
        $test_index = $this->stringmethods->indexOf(array('s','t','a','r'));
        $this->assertEquals(-1, $test_index);

        // Test string that does occur and is at the beginning
        $test_index = $this->stringmethods->indexOf(array('t', 'h'));
        $this->assertEquals(0, $test_index);

        // Test string that does occur and in in the middle
        $test_index = $this->stringmethods->indexOf(array('a', 't','e'));
        $this->assertEquals(6, $test_index);

        // Test string that does occur and is at the end
        $test_index = $this->stringmethods->indexOf(array('t', 'e', 's', 't'));
        $this->assertEquals(7, $test_index);

        // Test string that does occur and is found more than once
        $test_index = $this->stringmethods->indexOf(array('i', 's'));
        $this->assertEquals(2, $test_index);
    }

    function test_Reverse()
    {
        // Test null case
        $test_string = $this->stringmethods->reverse(null);
        $this->assertEquals(-1, $test_string);

        // Test single character
        $test_string = $this->stringmethods->reverse(array('t'));
        $this->assertTrue($this->arraysEqual(array('t'), $test_string));

        // Test a string
        $test_string = $this->stringmethods->reverse(array('t', 'e', 's', 't'));
        $this->assertTrue($this->arraysEqual(array('t', 's', 'e', 't'), $test_string));

        // Test the reverse of that string
        $test_string = $this->stringmethods->reverse(array('t', 's', 'e', 't'));
        $this->assertTrue($this->arraysEqual(array('t', 'e', 's', 't'), $test_string));
    }

    function test_arraysEqual()
    {
        $this->assertTrue($this->arraysEqual(array('t', 's', 'e', 't'), array('t', 's', 'e', 't')));
        $this->assertTrue($this->arraysEqual(array('t'), array('t')));
    }

    static function arraysEqual($array1, $array2)
    {
        for($i = 0; $i < count($array1); $i++){
            if($array1[$i] != $array2[$i]) return false;
        }
        return true;
    }
}
