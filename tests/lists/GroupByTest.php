<?php

namespace Tests\Lists;

use PHPUnit\Framework\TestCase;
use function FPPHP\Lists\groupBy;
use function FPPHP\Functions\memoize;


class GroupByTest extends TestCase
{
    public function test_it_should_group_by_a_given_function_that_returs_the_key_to_the_sub_list()
    {
        $students = [
            ["name" => "João", "score" => 84],
            ["name" => "Rute", "score" => 88],
            ["name" => "Pedro", "score" => 58],
            ["name" => "Ana", "score" => 69]
        ];

        $byGrades = memoize(groupBy(function ($s) {
            $score = $s["score"];
            return ($score < 65 ? 'F' : ($score < 70 ? 'D' : ($score < 80 ? 'C' : ($score < 90 ? 'B' : 'A'))));
        }));

        $res = $byGrades($students);
        $this->assertEquals(["B" => [["name" => "João", "score" => 84], ["name" => "Rute", "score" => 88]], "D" => [["name" => "Ana", "score" => 69]], "F" => [["name" => "Pedro", "score" => 58]]], $res);

        $students = [];

        $byGrades = groupBy(function ($s) {
            $score = $s["score"];
            return ($score < 65 ? 'F' : ($score < 70 ? 'D' : ($score < 80 ? 'C' : ($score < 90 ? 'B' : 'A'))));
        });

        $res = $byGrades($students);
        $this->assertEquals([], $res);
    }
}
