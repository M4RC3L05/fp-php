<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\uniq;


class UniqTest extends TestCase
{
    public function test_it_should_return_a_list_with_only_uniq_values()
    {
        $arr = [1, 2, 1, 3, 4, 4, 6];
        $res = uniq($arr);
        $this->assertEquals([1, 2, 3, 4, 6], $res);

        $arr = [[1], [2], [1]];
        $res = uniq($arr);
        $this->assertEquals([[1], [2]], $res);

        $arr = ["1", 1];
        $res = uniq($arr);
        $this->assertEquals(["1", 1], $res);

        $arr = [["a" => 1], ["b" => 2], ["a" => 1]];
        $res = uniq($arr);
        $this->assertEquals([["a" => 1], ["b" => 2]], $res);
    }
}
