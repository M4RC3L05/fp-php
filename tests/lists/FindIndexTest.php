<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\findIndex;


class FindIndexTest extends TestCase
{
    public function test_it_should_get_the_index_of_the_matched_value_from_perdicate()
    {
        $arr = [1, 2, 3, 4];
        $res = findIndex(function ($x, $y) {
            return $x === 3;
        })($arr);
        $this->assertEquals(2, $res);

        $arr = [1, 2, 3, 4];
        $res = findIndex(function ($x, $y) {
            return $x === 5;
        })($arr);
        $this->assertEquals(-1, $res);


        $arr = ["a" => "a", "b" => "b"];
        $res = findIndex(function ($x, $y) {
            return $x === "b";
        })($arr);
        $this->assertEquals("b", $res);

        $arr = ["a" => "a", "b" => "b"];
        $res = findIndex(function ($x, $y) {
            return $x === "c";
        })($arr);
        $this->assertEquals(-1, $res);
    }
}
