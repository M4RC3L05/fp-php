<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\splitAt;


class SplitAtTest extends TestCase
{
    public function test_it_should_split_array_at_index()
    {
        $arr = [1, 2, 3, 4];
        $res = splitAt(1)($arr);
        $this->assertEquals([[1], [2, 3, 4]], $res);

        $arr = ["a" => 1, "b" => 2, "c" => 3, "d" => 4];
        $res = splitAt(1)($arr);
        $this->assertEquals([["a" => 1], ["b" => 2, "c" => 3, "d" => 4]], $res);
    }
}
