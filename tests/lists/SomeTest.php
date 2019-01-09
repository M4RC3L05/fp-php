<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\some;


class SomeTest extends TestCase
{
    public function test_it_should_check_if_a_given_iterable_have_some_values()
    {
        $res = some(function ($x) {
            return $x === 2;
        })([1, 2, 3, 4, 5]);

        $this->assertTrue($res);

        $res = some(function ($x) {
            return $x === 10;
        })([1, 2, 3, 4, 5]);

        $this->assertFalse($res);
    }
}
