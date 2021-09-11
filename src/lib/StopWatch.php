<?php

namespace Lib;

use InvalidArgumentException;

class StopWatch
{
    // TODO: enumを使う
    const STATE_INITIAL = 0;
    const STATE_RUNNING = 1;
    const STATE_PAUSED = 2;

    private int $state;

    public function __construct(int $state = self::STATE_INITIAL)
    {
        $this->state = $state;
    }

    public function start(): void
    {
        if ($this->state === self::STATE_INITIAL) {
            $this->state = self::STATE_RUNNING;
        } else if ($this->state === self::STATE_RUNNING) {
            $this->state = self::STATE_PAUSED;
        } else {
            $this->state = self::STATE_RUNNING;
        }
    }

    public function reset(): void
    {
        if ($this->state === self::STATE_PAUSED) {
            $this->state = self::STATE_INITIAL;
        }
    }

    public function setState(int $state): void
    {
        if (!in_array($state, [self::STATE_INITIAL, self::STATE_RUNNING, self::STATE_PAUSED])) {
            throw new InvalidArgumentException("$stateの値が不正です");
        }

        $this->state = $state;
    }

    public function getState(): int
    {
        return $this->state;
    }
}
