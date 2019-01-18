<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\uniqWith;


class UniqWithTest extends TestCase
{
    public function test_it_should_return_a_list_with_uniq_values_based_on_a_perdicate()
    {
        $arr = ['1', 2, 1, 2, 1];
        $res = uniqWith(function ($curr, $v) {
            return (string)$curr === (string)($v);
        })($arr);

        $this->assertEquals(["1", 2], $res);

        $arr = [1, 2, "1", 2, 1];
        $res = uniqWith(function ($curr, $v) {
            return (string)$curr === (string)($v);
        })($arr);

        $this->assertEquals([1, 2], $res);
    }
}
