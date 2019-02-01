<?php

namespace FPPHP\Lists;

/**
 * 
 * mergeAll: [[x => y]] -> [x => y]
 * 
 * Merges a list of associative arrays into one associative array
 * 
 * @param array $list
 * @return array
 * 
 */
function mergeAll(array $list)
{
    return reduce(function ($acc, $curr) {
        return \array_merge($acc, $curr);
    })([])($list);
}
