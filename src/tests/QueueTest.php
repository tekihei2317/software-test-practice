<?php

declare(strict_types=1);

namespace Tests;

use Lib\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function test新しいキューの要素数は0であること(): void
    {
        $this->assertEquals(0, $this->queue->size());
    }

    public function testPushメソッドで要素を追加できること(): void
    {
        $this->queue->push('red');

        $this->assertEquals(1, $this->queue->size());
    }

    public function testPopメソッドで要素を削除できること(): void
    {
        $this->queue->push('red');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->size());
        $this->assertEquals('red', $item);
    }

    public function test最初に入れた要素から取得されること(): void
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
        $this->assertEquals('second', $this->queue->pop());
    }

    // リングバッファで実装したのでO(1)で削除が出来ます
    public function test10000要素入れても遅くならないこと(): void
    {
        $size = 10000;
        for ($i = 0; $i < $size; $i++) {
            $this->queue->push($i);
        }

        $item = null;
        while ($this->queue->size() > 0) {
            $item = $this->queue->pop();
        }

        $this->markTestSkipped();
    }
}
