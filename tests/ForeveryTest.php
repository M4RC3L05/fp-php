<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function FPPHP\forEvery;

class ForeveryTest extends TestCase
{
    public function test_it_should_loop_an_iterable()
    {

        //ARRAYS
        $arr = [1, 2, 3];

        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        }, $arr);
        $out = \ob_get_clean();
        $this->assertEquals("01 12 23 ", $out);


        // ArrayIterator
        $arrIte = new \ArrayIterator([1, 2, 3]);

        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        }, $arrIte);
        $out2 = \ob_get_clean();
        $this->assertEquals("01 12 23 ", $out2);

        // generators
        $gen = (function () {
            yield 1;
            yield 2;
            yield 3;
        })();

        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        }, $gen);
        $out3 = \ob_get_clean();
        $this->assertEquals("01 12 23 ", $out3);

        //assoc arrays
        $arr3 = [
            "a" => "a",
            "b" => "b",
            "c" => "c"
        ];

        \ob_start();
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        }, $arr3);
        $out4 = \ob_get_clean();
        $this->assertEquals("aa bb cc ", $out4);


    }
}
