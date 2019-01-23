<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\ascend;


class AscendTest extends TestCase
{
    public function test_it_should_create_a_comparator_functions_that_orders_in_ascendent_order()
    {
        $arr = [6, 5, 4, 3, 2, 1];
        $ascOrd = ascend(function ($x) {
            return $x;
        });
        \usort($arr, $ascOrd);
        $this->assertEquals([1, 2, 3, 4, 5, 6], $arr);


        $arr = [
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Peter', "age" => 78],
            ["name" => 'Mikhail', "age" => 62],
        ];
        $ascOrd = ascend(function ($x) {
            return $x["age"];
        });
        \usort($arr, $ascOrd);
        $this->assertEquals([
            ["name" => 'Mikhail', "age" => 62],
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Peter', "age" => 78]
        ], $arr);

        $Mikhail = new class
        {
            public $name = "Mikhail";
            public $age = 62;
        };
        $arr = [
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Peter', "age" => 78],
            $Mikhail,
        ];
        $ascOrd = ascend(function ($x) {
            return is_array($x) ? $x["age"] : $x->age;
        });
        \usort($arr, $ascOrd);
        $this->assertEquals([
            $Mikhail,
            ["name" => 'Emma', "age" => 70],
            ["name" => 'Peter', "age" => 78]
        ], $arr);
    }
}
