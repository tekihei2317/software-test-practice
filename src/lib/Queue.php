<?php

namespace Lib;

class Queue
{
    private array $items = [];

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function size(): int
    {
        return count($this->items);
    }
}
