<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\unnest;


class UnnestTest extends TestCase
{
    public function test_it_should_remove_one_level_of_nesting_of_list()
    {
        $arr = [1, [2], [[3]]];
        $res = unnest($arr);
        $this->assertEquals([1, 2, [3]], $res);

        $arr = [[], [2, 3], [4, 5], [6, 7]];
        $res = unnest($arr);
        $this->assertEquals([2, 3, 4, 5, 6, 7], $res);
    }
}
