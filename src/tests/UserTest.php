<?php

declare(strict_types=1);

namespace Tests;

use Lib\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
    }

    public function testフルネームを取得できること()
    {
        $user = new User('taro', 'test');
        $this->assertEquals('taro test', $user->getFullName());
    }
}
