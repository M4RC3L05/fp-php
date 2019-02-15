<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\tryCatch;
use function FPPHP\Functions\F;


class TryCatchTest extends TestCase
{
    public function test_it_should_try_catch_functions()
    {
        $res = tryCatch(function ($x) {
            return $x["a"];
        })("FPPHP\Functions\F")(["a" => "b"]);

        $this->assertEquals("b", $res);

        $res = tryCatch(function ($x) {
            throw new \Exception("");

        })("FPPHP\Functions\F")(["a" => "b"]);

        $this->assertFalse($res);
    }
}
