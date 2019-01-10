<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\findLastIndex;


class FindLastIndexTest extends TestCase
{
    public function test_it_should_return_the_index_of_the_last_matched_element_from_the_perdicate()
    {
        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = findLastIndex(function ($x, $y) {
            return $x === 5;
        })($arr);
        $this->assertEquals(2, $res);

        $arr = [1, 2, 3, 4, 5, 6, 7];

        $res = findLastIndex(function ($x, $y) {
            return $x === 10;
        })($arr);
        $this->assertEquals(-1, $res);


        $arr = ["a" => "a", "b" => "a"];

        $res = findLastIndex(function ($x, $y) {
            return $x === "a" && $y === "b";
        })($arr);
        $this->assertEquals("b", $res);
    }
}
