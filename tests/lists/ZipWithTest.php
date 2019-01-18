<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\zipWith;


class ZipWithTest extends TestCase
{
    public function test_it_should_zip_gien_an_function()
    {
        $res = zipWith(function ($x, $y) {
            return [$x, $y];
        })([1, 2, 3])(["a", "c"]);
        $this->assertEquals([[1, "a"], [2, "c"]], $res);

        $res = zipWith(function ($x, $y) {
            return [$x, $y];
        })([1, 2, 3])(["a", "b", "c"]);
        $this->assertEquals([[1, "a"], [2, "b"], [3, "c"]], $res);
    }
}
