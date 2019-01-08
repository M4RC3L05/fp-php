<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\filter;



class FilterTest extends TestCase
{
    public function test_it_should_filter_an_array()
    {
        $arr = [1, 2, 3];
        $arrFiltered = filter(function ($x) {
            return $x !== 1;
        })()($arr);

        $this->assertEquals([2, 3], $arrFiltered);
    }
}
