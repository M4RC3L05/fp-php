<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\none;


class NoneTest extends TestCase
{
    public function test_it_should_check_if_none_match_perdicate()
    {
        $isEven = function ($n) {
            return $n % 2 === 0;
        };

        $res = none($isEven)([1, 3, 5, 7, 9]);
        $this->assertTrue($res);
        $res = none($isEven)([1, 3, 5, 7, 9, 2]);
        $this->assertFalse($res);
    }
}
