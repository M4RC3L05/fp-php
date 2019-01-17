<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\splitEvery;


class SplitEveryTest extends TestCase
{
    public function test_it_should_split_into_slices_of_given_length()
    {
        $arr = [1, 2, 3, 4, 5];
        $res = splitEvery(1)($arr);
        $this->assertEquals([[1], [2], [3], [4], [5]], $res);

        $arr = [1, 2, 3, 4, 5];
        $res = splitEvery(2)($arr);
        $this->assertEquals([[1, 2], [3, 4], [5]], $res);
    }
}
