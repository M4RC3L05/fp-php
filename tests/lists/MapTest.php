<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\map;


class MapTest extends TestCase
{
    public function test_it_should_map_over_an_array()
    {
        $arr = [1, 2, 3];
        $arrMapped = map(function ($x) {
            return $x + 1;
        })($arr);

        $this->assertEquals([1, 2, 3], $arr);
        $this->assertEquals([2, 3, 4], $arrMapped);
    }
}
