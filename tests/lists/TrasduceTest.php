<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\transduce;
use function FPPHP\Functions\compose;
use function FPPHP\Lists\take;
use function FPPHP\Lists\rangeList;
use function FPPHP\Lists\filter;
use function FPPHP\Lists\append;
use function FPPHP\Functions\curry;
use function FPPHP\Functions\pipe;


class TransduceTest extends TestCase
{
    public function test_it_should_transduce_array()
    {
        $isOdd = function ($x) {
            return $x % 2 === 1;
        };

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

        $xfilter = function ($p) {
            return function ($rf) use ($p) {
                return function ($acc, $curr) use ($rf, $p) {
                    return $p($curr) ? $rf($acc, $curr) : $acc;
                };
            };
        };

        $firstOddTrasducer = compose($xfilter($isOdd), $xtake(1));
        $res = transduce($firstOddTrasducer)(function ($acc, $curr) {
            return append($curr)($acc);
        })([])(rangeList(1)(100));
        $this->assertEquals([1], $res);
    }
}
