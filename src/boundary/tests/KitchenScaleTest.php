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

    /**
     * @dataProvider boundaryProvider
     */
    public function test境界値のテスト(int $weight, $output)
    {
        // どこで落ちたか分かりづらいので、1つにまとめるのはあまり良くなさそう
        $this->assertEquals($output, $this->scale->display($weight));
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

    public function boundaryProvider(): array
    {
        return [
            [-1, 'EEEE'],
            [0, 0],
            [2000, 2000],
            [2001, 'EEEE']
        ];
    }
}
