<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\bind;


class BindTest extends TestCase
{
    public function test_it_should_bind_to_a_new_context()
    {
        $fn = function () {
            return $this->name;
        };

        $res = bind(new class
        {
            public $name = "abc";
        }
        )($fn);

        $this->assertEquals("abc", $res());
    }
}
        