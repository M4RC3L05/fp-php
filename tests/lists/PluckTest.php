<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\pluck;

class Person2
{
    public $name;
    public $country;

    public function __construct($name, $country)
    {
        $this->name = $name;
        $this->country = $country;
    }
}

class PluckTest extends TestCase
{
    public function test_it_should_pluck_the_values_from_a_given_key()
    {
        $arr = [[1, 2], []];
        $res = pluck(0)($arr);
        $this->assertEquals([1, null], $res);

        $arr = ["a" => ["val" => 3], "b" => ["val" => 5]];
        $res = pluck("val")($arr);
        $this->assertEquals(["a" => 3, "b" => 5], $res);

        $arr = [["age" => 29], ["age" => 27]];
        $res = pluck("age")($arr);
        $this->assertEquals([29, 27], $res);

        $arr = [new Person2("João", "a"), new Person2("Ana", "b")];
        $res = pluck("name")($arr);
        $this->assertEquals(["João", "Ana"], $res);

        $arr = ["a" => new Person2("João", "a"), "b" => new Person2("Ana", "b")];
        $res = pluck("name")($arr);
        $this->assertEquals(["a" => "João", "b" => "Ana"], $res);

        $arr = [];
        $res = pluck("age")($arr);
        $this->assertEquals([], $res);
    }
}
