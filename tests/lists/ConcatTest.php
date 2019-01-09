<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\concat;


class ConcatTest extends TestCase
{
    public function test_it_should_concat_2_arrays()
    {
        $contArr = concat([1])([1, 2, 3]);
        $contArr2 = concat(["a" => "a"])(["b" => "b"]);

        $this->assertEquals([1, 1, 2, 3], $contArr);
        $this->assertEquals(["a" => "a", "b" => "b"], $contArr2);
    }
}
