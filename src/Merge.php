<?php

namespace Consolidare;

use Consolidare\Mergeable\Mergeable;
use Consolidare\Mergeable\MergeableFactory;
use Consolidare\MergeStrategy\MergeStrategy;
use Consolidare\Record\RecordFactory;

class Merge
{
    private $mergeable = [];

    public function data($input)
    {
        return $this->mergeable(MergeableFactory::create($input));
    }

    public function mergeable(Mergeable $data)
    {
        $this->mergeable[] = $data;

        return $this;
    }

    public function merge(MergeStrategy $strategy = NULL)
    {
        if (!$strategy) {
            $strategy = new MergeStrategy();
        }

        $record = NULL;

        foreach ($this->mergeable as $data) {
            $record = RecordFactory::create(
                $strategy,
                $record,
                $data
            );
        }

        return $record;
    }
}
