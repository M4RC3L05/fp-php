<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\length;


class LengthTest extends TestCase
{
    public function test_it_should_return_the_length_of_array()
    {
        $res = length([1, 2, 3]);
        $this->assertEquals(3, $res);

        $res = length([]);
        $this->assertEquals(0, $res);

        $res = length(["a" => "b"]);
        $this->assertEquals(1, $res);
    }
}
