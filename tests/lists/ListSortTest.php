<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\listSort;


class ListSortTest extends TestCase
{
    public function test_it_should_sort_arr()
    {
        $arr = [4, 2, 7, 5];
        $res = listSort(function ($x, $y) {
            return $x - $y;
        })($arr);
        $this->assertEquals([2, 4, 5, 7], $res);

        $res = listSort(function ($x, $y) {
            return $x > $y ? -1 : 1;
        })($arr);
        $this->assertEquals([7, 5, 4, 2], $res);
    }
}
