<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\mergeAll;


class MergAllTest extends TestCase
{
    public function test_it_should_merge_all_to_single_assoc_arr()
    {
        $res = mergeAll([[
            "foo" => 1
        ], [
            "bar" => 2
        ], [
            "baz" => 3
        ]]);
        $this->assertEquals(["foo" => 1, "bar" => 2, "baz" => 3], $res);

        $res = mergeAll([[
            "foo" => 1
        ], [
            "bar" => 2
        ], [
            "bar" => 3
        ]]);
        $this->assertEquals(["foo" => 1, "bar" => 3], $res);

        $res = mergeAll([]);
        $this->assertEquals([], $res);

        $res = mergeAll([[]]);
        $this->assertEquals([], $res);
    }
}
