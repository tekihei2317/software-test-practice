<?php

declare(strict_types=1);

namespace Tests;

use Error;
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

    public function test最大要素数の数だけpushできること(): void
    {
        for ($i = 0; $i < Queue::MAX_SIZE; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_SIZE, $this->queue->size());
    }

    public function test最大要素数を超えると例外が発生すること(): void
    {
        for ($i = 0; $i < Queue::MAX_SIZE; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(Error::class);
        $this->expectExceptionMessage("これ以上追加することは出来ません");

        $this->queue->push(0);
    }
}
