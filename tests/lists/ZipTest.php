<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\zip;


class ZipTest extends TestCase
{
    public function test_it_should_zip_2_arrays_together()
    {
        $res = zip([1, 2, 3])(["a", "b", "c"]);
        $this->assertEquals([[1, 'a'], [2, 'b'], [3, 'c']], $res);

        $res = zip([1, 2, 3])(["a", "b"]);
        $this->assertEquals([[1, 'a'], [2, 'b']], $res);

        $res = zip([1])(["a", "b"]);
        $this->assertEquals([[1, 'a']], $res);

        $res = zip([])(["a", "b", "c"]);
        $this->assertEquals([], $res);

        $res = zip(["a" => "a"])(["a", "b", "c"]);
        $this->assertEquals([["a" => "a", "a"]], $res);
    }
}
