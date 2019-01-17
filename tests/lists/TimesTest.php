<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\times;


class TimesTest extends TestCase
{
    public function test_it_should_return_a_list_of_applying_all_function_calls()
    {
        $res = times(function ($x) {
            return $x + 2;
        })(5);
        $this->assertEquals([2, 3, 4, 5, 6], $res);

        $res = times(function ($x) {
            return $x;
        })(5);

        $this->assertEquals([0, 1, 2, 3, 4], $res);
    }
}
