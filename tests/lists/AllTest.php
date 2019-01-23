<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\all;


class AllTest extends TestCase
{
    public function test_it_should_be_true_if_all_elements_match_the_perdicate()
    {
        $res = all(function ($x) {
            return $x === 3;
        })([3, 3, 3, 3]);
        $this->assertTrue($res);

        $res = all(function ($x) {
            return $x === 3;
        })([3, 3, 1, 3]);
        $this->assertFalse($res);
    }
}
