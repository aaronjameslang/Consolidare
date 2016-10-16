<?php

namespace RecordMerge\MergePatterns;

use RecordMerge\MergePatterns\MergePattern;

class Right implements MergePattern
{
    public function __invoke($left, $right)
    {
        return $right;
    }
}