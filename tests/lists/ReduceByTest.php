<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\reduceBy;


class ReduceByTest extends TestCase
{
    public function test_it_should_reduce_by_a_given_key_fn()
    {
        $groupNames = function ($acc, $curr) {
            return \array_merge($acc, [$curr["name"]]);
        };

        $toGrade = function (array $person) {
            $score = $person["score"];

            return ($score < 65 ? 'F' : ($score < 70 ? 'D' : ($score < 80 ? 'C' :
                $score < 90 ? 'B' : 'A')));
        };


        $students = [
            ["name" => 'Abby', "score" => 83],
            ["name" => 'Bart', "score" => 62],
            ["name" => 'Curt', "score" => 88],
            new class
            {
                public $name = 'Dora';
                public $score = 92;
            }
        ];

        $res = reduceBy($groupNames)([])($toGrade)($students);
        $this->assertEquals(["A" => ["Dora"], "B" => ["Abby", "Curt"], "F" => ["Bart"]], $res);
    }
}
