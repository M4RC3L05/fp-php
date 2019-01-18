<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\xprod;


class XprodTest extends TestCase
{
    public function test_it_shoudl_return_a_list_with_all_possible_combination_between_2_arrays()
    {
        $res = xprod([1, 2])(["a", "b"]);
        $this->assertEquals([[1, 'a'], [1, 'b'], [2, 'a'], [2, 'b']], $res);

        $res = xprod(["a" => 1, "b" => 2])(["a", "b"]);
        $this->assertEquals([["a" => 1, 'a'], ["a" => 1, 'b'], ["b" => 2, 'a'], ["b" => 2, 'b']], $res);

        $res = xprod([1, 2])(["c" => "a", "d" => "b"]);
        $this->assertEquals([[1, "c" => 'a'], [1, "d" => 'b'], [2, "c" => 'a'], [2, "d" => 'b']], $res);

        $res = xprod(["a" => 1, "b" => 2])(["c" => "a", "d" => "b"]);
        $this->assertEquals([["a" => 1, "c" => 'a'], ["a" => 1, "d" => 'b'], ["b" => 2, "c" => 'a'], ["b" => 2, "d" => 'b']], $res);

        $res = xprod([])(["a", "b"]);
        $this->assertEquals([], $res);

        $res = xprod([])([]);
        $this->assertEquals([], $res);

        $res = xprod([1, 2])([]);
        $this->assertEquals([], $res);
    }
}
