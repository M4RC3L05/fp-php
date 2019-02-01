<?php

namespace FPPHP\Lists;

/**
 * 
 * splitWhen: (x -> bool) -> x -> [[x], [x]]
 * 
 * FROM RAMDAJS DOCS
 * Takes a list and a predicate and returns a pair of lists with the following properties:
 *
 * - the result of concatenating the two output lists is equivalent to the input list;
 * - none of the elements of the first output list satisfies the predicate; and
 * - if the second output list is non-empty, its first element satisfies the predicate.
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function splitWhen(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        if (count($list) <= 0) return [[], []];
        $splitAt = 0;
        $values = \array_values($list);
        $tmpArr = [];


        while ($splitAt < count($list) && !$perdicate($values[$splitAt])) {
            \array_push($tmpArr, $values[$splitAt]);
            $splitAt += 1;
        }

        return [$tmpArr, \array_slice($list, $splitAt)];
    };
}
