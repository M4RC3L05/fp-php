<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\find;


class FindTest extends TestCase
{
    public function test_it_should_find_the_first_matched_elemente_and_return_it()
    {
        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = find(function ($x, $y) {
            return $x === 5;
        })($arr);
        $this->assertEquals(5, $res);

        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = find(function ($x, $y) {
            return $x === 10;
        })($arr);
        $this->assertEquals(null, $res);


        $arr = ["a" => "a", "b" => "a"];

        $res = find(function ($x, $y) {
            return $x === "a" && $y === "b";
        })($arr);
        $this->assertEquals("a", $res);
    }
}
