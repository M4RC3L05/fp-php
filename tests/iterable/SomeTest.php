<?php

namespace Tests\Iterable;

use PHPUnit\Framework\TestCase;
use function FPPHP\Iterable\some;


class SomeTest extends TestCase
{
    public function test_it_should_check_id_a_given_iterable_have_some_values()
    {
        $res = some(function ($x) {
            return $x === 2;
        })([1, 2, 3, 4, 5]);

        $this->assertTrue($res);
    }

    public function test_it_should_throw_if_invalid_data_is_provided()
    {
        try {
            some("")("");
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Condition must be a function.");
        }

        try {
            some(function () {
            })("");
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Data must be a iterable.");
        }

        try {
            some("")([1]);
            $this->fail("Did not raize exception");
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), "Condition must be a function.");
        }
    }
}
