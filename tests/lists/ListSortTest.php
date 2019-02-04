<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\listSort;


class ListSortTest extends TestCase
{
    public function test_it_should_sort_and_list()
    {
        $arr = [32, 35, 64, 21, 52, 34, 745, 723, 546];
        $sortArr = listSort(function ($x, $y) {
            return $x < $y ? -1 : 1;
        })($arr);
        $this->assertEquals([21, 32, 34, 35, 52, 64, 546, 723, 745], $sortArr);
    }
}
        