<?php

declare(strict_types=1);

namespace Tests;

use Lib\StopWatch;
use PHPUnit\Framework\TestCase;

class StopWatchTest extends TestCase
{
    private StopWatch $stopWatch;

    protected function setUp(): void
    {
        $this->stopWatch = new StopWatch();
    }

    public function test初期状態でスタートボタンを押した場合、計測中になること()
    {
        $this->stopWatch->setState(StopWatch::STATE_INITIAL);
        $this->stopWatch->start();

        $this->assertEquals(StopWatch::STATE_RUNNING, $this->stopWatch->getState());
    }

    public function test計測状態でスタートボタンを押した場合、一時停止状態になること()
    {
        $this->stopWatch->setState(StopWatch::STATE_RUNNING);
        $this->stopWatch->start();

        $this->assertEquals(StopWatch::STATE_PAUSED, $this->stopWatch->getState());
    }

    public function test一時停止状態でスタートボタンを押した場合、計測状態になること()
    {
        $this->stopWatch->setState(StopWatch::STATE_PAUSED);
        $this->stopWatch->start();

        $this->assertEquals(StopWatch::STATE_RUNNING, $this->stopWatch->getState());
    }

    public function test一時停止状態でリセットボタンを押した場合、初期状態になること()
    {
        $this->stopWatch->setState(StopWatch::STATE_PAUSED);
        $this->stopWatch->reset();

        $this->assertEquals(StopWatch::STATE_INITIAL, $this->stopWatch->getState());
    }
}
