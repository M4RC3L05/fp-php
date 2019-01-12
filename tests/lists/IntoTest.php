<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\into;
use function FPPHP\Functions\compose;
use function FPPHP\Lists\map;
use function FPPHP\Lists\take;


class IntoTest extends TestCase
{
    public function test_it_should_reduce_a_list_by_a_trasducer()
    {
        $arr = [1, 2, 3];
        $adder = map(function ($x) {
            return $x + 1;
        });

        $trasducer = compose($adder, take(2));
        $res = into([])($trasducer)($arr);
        $this->assertEquals([2, 3], $res);

        $res = into([1, 2])($trasducer)(["a" => 1, "b" => 2]);
        $this->assertEquals([1, 2, "a" => 2, "b" => 3], $res);
    }
}
