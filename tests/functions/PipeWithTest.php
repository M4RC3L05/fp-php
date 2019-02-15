<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;
use function FPPHP\Functions\pipeWith;


class PipeWithTest extends TestCase
{
    public function test_it_should_pipe_with_callable()
    {
        $pipeWhileNotNull = pipeWith(function ($f, $res) {
            return \is_null($res) ? $res : $f($res);
        });
        $f = $pipeWhileNotNull([function ($x) {
            return $x ** 4;
        }, function ($x) {
            return (-$x);
        }, function ($x) {
            return $x + 1;
        }]);

        $this->assertEquals(-80, $f(3));
    }
}
