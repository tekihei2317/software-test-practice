<?php

declare(strict_types=1);

namespace Tests;

use Lib\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function test新しいキューの要素数は0であること(): Queue
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->size());

        return $queue;
    }

    /**
     * @depends test新しいキューの要素数は0であること
     */
    public function testPushメソッドで要素を追加できること(Queue $queue): Queue
    {
        $queue->push('red');

        $this->assertEquals(1, $queue->size());

        return $queue;
    }

    /**
     * @depends testPushメソッドで要素を追加できること
     */
    public function testPopメソッドで要素を削除できること(Queue $queue): void
    {
        $item = $queue->pop();

        $this->assertEquals(0, $queue->size());
        $this->assertEquals('red', $item);
    }
}
