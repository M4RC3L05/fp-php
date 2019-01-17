<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\startsWith;


class StartsWithTest extends TestCase
{
    public function test_it_should_check_if_array_starts_with_a_given_item()
    {
        $arr = [1, 2, 3];
        $res = startsWith([1])($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3];
        $res = startsWith([2])($arr);
        $this->assertFalse($res);

        $arr = ["a" => 1, "b" => 2, "c" => 3];
        $res = startsWith(["a" => 1])($arr);
        $this->assertTrue($res);
    }
}
