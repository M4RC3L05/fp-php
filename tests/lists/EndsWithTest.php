<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\endsWith;


class EndsWithTest extends TestCase
{
    public function test_it_should_tests_if_end_of_the_list_ands_with_specific_perdicate()
    {
        $arr = [1, 2, 3];
        $res = endsWith([1])($arr);
        $this->assertFalse($res);

        $arr = [1, 2, 3];
        $res = endsWith([3])($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3];
        $res = endsWith([2, 3])($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3];
        $res = endsWith([1, 2, 3])($arr);
        $this->assertTrue($res);

        $arr = [1, 2, 3];
        $res = endsWith([1, 2, 3, 4])($arr);
        $this->assertFalse($res);


        $arr = ["a" => "a", "b" => "b"];
        $res = endsWith(["b" => "b"])($arr);
        $this->assertTrue($res);

    }
}
