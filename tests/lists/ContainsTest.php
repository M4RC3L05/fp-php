<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\contains;


class ContainsTest extends TestCase
{
    public function test_it_should_check_if_list_contains_a_value()
    {
        $arr = [1, 2, 3, 4];

        $res = contains(1)($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3, [4]];

        $res = contains([4])($arr);
        $this->assertTrue($res);

        $arr = ["a" => "a", "b" => "b"];

        $res = contains(1)($arr);
        $this->assertFalse($res);

        $arr = ["a" => "a", "b" => "b"];

        $res = contains("b")($arr);
        $this->assertTrue($res);

        $arr = ["a" => "a", "b" => "b"];

        $res = contains(["b" => "b"])($arr);
        $this->assertTrue($res);
    }
}
