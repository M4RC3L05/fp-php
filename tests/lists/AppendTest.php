<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\append;


class AppendTest extends TestCase
{
    public function test_it_should_append_to_the_array()
    {
        $arr = [1, 2, 3];
        $arrAppended = append(1)($arr);

        $this->assertEquals([1, 2, 3, 1], $arrAppended);

        $arr = ["a" => "a", "b" => "b"];
        $arrAppended = append(["c" => "c"])($arr);

        $this->assertEquals(["a" => "a", "b" => "b", "c" => "c"], $arrAppended);
    }
}
