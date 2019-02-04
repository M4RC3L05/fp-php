<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\descend;


class DescendTest extends TestCase
{
    public function test_it_should_create_a_descending_comparator_function()
    {
        $arr = [6, 5, 4, 3, 2, 1];
        $descOrd = descend(function ($x) {
            return $x;
        });
        \usort($arr, $descOrd);
        $this->assertEquals([6, 5, 4, 3, 2, 1], $arr);


        $arr = [
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Peter', "age" => 78],
            ["name" => 'Mikhail', "age" => 62],
        ];
        $descOrd = descend(function ($x) {
            return $x["age"];
        });
        \usort($arr, $descOrd);
        $this->assertEquals([
            ["name" => 'Peter', "age" => 78],
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Mikhail', "age" => 62]
        ], $arr);

        $Mikhail = new class
        {
            public $name = "Mikhail";
            public $age = 62;
        };
        $arr = [
            ["name" => 'Peter', "age" => 78],
            ["name" => 'Emma', "age" => 70],
            $Mikhail,
        ];
        $descOrd = descend(function ($x) {
            return is_array($x) ? $x["age"] : $x->age;
        });
        \usort($arr, $descOrd);
        $this->assertEquals([
            ["name" => 'Peter', "age" => 78],
            ["name" => 'Emma', "age" => 70],
            $Mikhail
        ], $arr);
    }
}
        