<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Boundary\Lib\KitchenScale;

class KitchenScaleTest extends TestCase
{
    private KitchenScale $scale;

    protected function setUp(): void
    {
        $this->scale = new KitchenScale;
    }

    // 境界値テスト
    public function testマイナス1gのときにエラーが表示されること()
    {
        $result = $this->scale->display(-1);
        $this->assertEquals('EEEE', $result);
    }

    public function test0gのときに重さが表示されること()
    {
        $result = $this->scale->display(0);
        $this->assertEquals(0, $result);
    }

    public function test2000gのときに重さが表示されること()
    {
        $result = $this->scale->display(2000);
        $this->assertEquals(2000, $result);
    }

    public function test2001gのときにエラーが表示されること()
    {
        $result = $this->scale->display(2001);
        $this->assertEquals('EEEE', $result);
    }

    // 代表値テスト
    public function testマイナス100グラムのときにエラーが表示されること()
    {
        $result = $this->scale->display(-100);
        $this->assertEquals('EEEE', $result);
    }

    public function test1000gのときに重さが表示されること()
    {
        $result = $this->scale->display(1000);
        $this->assertEquals(1000, $result);
    }

    public function test2500グラムのときにエラーが表示されること()
    {
        $result = $this->scale->display(2500);
        $this->assertEquals('EEEE', $result);
    }
}
