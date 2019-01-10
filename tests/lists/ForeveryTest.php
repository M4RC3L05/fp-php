<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\forEvery;

class ForeveryTest extends TestCase
{
    public function test_it_should_loop_an_iterable()
    {

        //ARRAYS
        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        })([1, 2, 3]);
        $out = \ob_get_clean();
        $this->assertEquals($out, "01 12 23 ");


        // ArrayIterator
        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        })(new \ArrayIterator([1, 2, 3]));
        $out2 = \ob_get_clean();
        $this->assertEquals($out2, "01 12 23 ");

        // generators
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();

        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        })($gen);
        $out3 = \ob_get_clean();
        $this->assertEquals($out3, "01 12 23 ");

        //assoc arrays
        \ob_start();
        $r = forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        })([
            "a" => "a",
            "b" => "b",
            "c" => "c"
        ]);
        $out4 = \ob_get_clean();
        $this->assertEquals($out4, "aa bb cc ");
        $this->assertEquals([
            "a" => "a",
            "b" => "b",
            "c" => "c"
        ], $r);
    }
}
