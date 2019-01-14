<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\rangeList;


class RangeListTest extends TestCase
{
    public function test_it_should_create_an_list_of_numbers_given_a_range()
    {
        $res = rangeList(2)(0);
        $this->assertEquals([2, 1, 0], $res);

        $res = rangeList(1)(1);
        $this->assertEquals([1], $res);
    }
}
