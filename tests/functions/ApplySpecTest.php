<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\applySpec;


class ApplySpecTest extends TestCase
{
    public function test()
    {
        $spec = [
            "sum" => function ($x, $y) {
                return $x + $y;
            },
            "nested" => [
                "mult" => function ($x, $y) {
                    return $x * $y;
                }
            ]
        ];
        $res = applySpec($spec)(1, 2);
        $this->assertEquals([
            "sum" => 3,
            "nested" => [
                "mult" => 2
            ]
        ], $res);
    }
}
