<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\into;
use function FPPHP\Functions\compose;
use function FPPHP\Lists\map;
use function FPPHP\Lists\take;
use function FPPHP\Functions\curry;


class IntoTest extends TestCase
{
    public function test_it_should_reduce_a_list_by_a_trasducer()
    {
        $arr = [1, 2, 3, 4];

        $xtake = curry(function ($to, $rf) {
            $i = 0;
            return function ($acc, $curr) use (&$i, $to, $rf) {

                if ($i > $to - 1) {
                    $i += 1;
                    return $acc;
                }
                $i += 1;

                return $rf($acc, $curr);

            };
        });

        $xmapAdd = function ($rf) {
            return function ($acc, $curr) use ($rf) {
                return $rf($acc, $curr + 1);
            };
        };

        $trasducer = compose($xmapAdd, $xtake(2));
        $res = into([])($trasducer)($arr);
        $this->assertEquals([2, 3], $res);

        $res = into([1, 2])($trasducer)(["a" => 1, "b" => 2]);
        $this->assertEquals([1, 2, 2, 3], $res);
    }
}
