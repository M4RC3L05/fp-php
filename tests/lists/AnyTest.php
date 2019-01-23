<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\any;


class AnyTest extends TestCase
{
    public function test_it_should_return_true_if_any_of_the_elements_match_the_perdicate()
    {
        $res = any(function ($x) {
            return $x === 3;
        })([1, 2, 3]);
        $this->assertTrue($res);

        $res = any(function ($x) {
            return $x === 3;
        })([1, 2, 2]);
        $this->assertFalse($res);
    }
}
