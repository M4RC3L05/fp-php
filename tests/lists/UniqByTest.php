<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\uniqBy;
use function FPPHP\Functions\compose;


class UniqByTest extends TestCase
{
    public function test_it_should_return_a_list_with_uniq_values_based_on_function()
    {
        $arr = [-1, -5, 2, 10, 1, 2];
        $res = uniqBy(compose("\abs"))($arr);
        $this->assertEquals([-1, -5, 2, 10], $res);
    }
}
