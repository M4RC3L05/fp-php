<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\findLast;


class FindLastTest extends TestCase
{
    public function test_it_should_find_the_last_matched_element_from_the_perdicate_and_return_it()
    {
        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = findLast(function ($x, $y) {
            return $x === 5;
        })($arr);
        $this->assertEquals(5, $res);

        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = findLast(function ($x, $y) {
            return $x === 10;
        })($arr);
        $this->assertEquals(null, $res);


        $arr = ["a" => "a", "b" => "a"];

        $res = findLast(function ($x, $y) {
            return $x === "a" && $y === "b";
        })($arr);
        $this->assertEquals("a", $res);
    }
}
