<?php

namespace Lib;

use Error;

class Queue
{
    private array $items = [];
    private int $firstIndex = 0;
    public const MAX_SIZE = 10000;

    public function push($item)
    {
        if ($this->size() === self::MAX_SIZE) {
            throw new Error("これ以上追加することは出来ません");
        }

        $lastIndex = ($this->firstIndex + $this->size()) % self::MAX_SIZE;
        $this->items[$lastIndex] = $item;
    }

    public function pop()
    {
        $item = $this->items[$this->firstIndex];
        unset($this->items[$this->firstIndex]);
        $this->firstIndex = ($this->firstIndex + 1) % self::MAX_SIZE;

        return $item;
    }

    public function size(): int
    {
        return count($this->items);
    }
}
