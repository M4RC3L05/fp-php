<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\forEvery;

class D
{
    static function a($v, $k)
    {
        echo "{$k}{$v} ";
    }

    function b($v, $k)
    {
        echo "{$k}{$v} ";
    }
}

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
        forEvery(function ($v, $k) {
            echo "{$k}{$v} ";
        })([
            "a" => "a",
            "b" => "b",
            "c" => "c"
        ]);
        $out4 = \ob_get_clean();
        $this->assertEquals($out4, "aa bb cc ");

        \ob_start();
        forEvery([D::class, "a"])([1, 2, 3]);
        $out5 = \ob_get_clean();
        $this->assertEquals($out5, "01 12 23 ");

        \ob_start();
        forEvery([D::class, "b"])([1, 2, 3]);
        $out6 = \ob_get_clean();
        $this->assertEquals($out6, "01 12 23 ");
    }

    public function test_it_should_throw_if_invalid_data_is_provided()
    {
        try {
            forEvery("")("");
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Must pass a valid function.");
        }

        try {
            forEvery(function () {
            })("");
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Must pass a valid iterable.");
        }

        try {
            forEvery("")([1]);
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Must pass a valid function.");
        }
    }
}
