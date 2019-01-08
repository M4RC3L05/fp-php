<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\every;


class EveryTest extends TestCase
{
    public function test_it_should_check_if_a_given_iterable_have_every_value()
    {
        $res = every(function ($x) {
            return $x === 2;
        })([1, 2, 3, 4, 5]);

        $this->assertFalse($res);

        $res = every(function ($x) {
            return $x === 2;
        })([2, 2, 2]);

        $this->assertTrue($res);
    }
}
