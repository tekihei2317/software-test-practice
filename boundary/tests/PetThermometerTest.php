<?php

declare(strict_types=1);

require __DIR__ . "/../lib/PetThermometer.php";

use PHPUnit\Framework\TestCase;
use Boundary\Lib\PetThermometer;

class PetThermometerTest extends TestCase
{
    private PetThermometer $thermometer;

    protected function setUp(): void
    {
        $this->thermometer = new PetThermometer();
    }

    // 境界値テスト(上限と下限をテストする)
    // 関数名はドット(.)が使えなかったためアンダースコア(_)で代用
    public function test23_9度の場合寒いが返ってくること(): void
    {
        $result = $this->thermometer->calc(23.9);
        $this->assertEquals('寒い', $result);
    }

    public function test24_0度の場合快適が返ってくること(): void
    {
        $result = $this->thermometer->calc(24.0);
        $this->assertEquals('快適', $result);
    }

    public function test25_9度の場合快適が返ってくること(): void
    {
        $result = $this->thermometer->calc(25.9);
        $this->assertEquals('快適', $result);
    }

    public function test26度の場合暑いが返ってくること(): void
    {
        $result = $this->thermometer->calc(26.0);
        $this->assertEquals('暑い', $result);
    }

    // 代表値テスト
    public function test20度の場合寒いが返ってくること(): void
    {
        $result = $this->thermometer->calc(20.0);
        $this->assertEquals('寒い', $result);
    }

    public function test25度の場合快適が返ってくること(): void
    {
        $result = $this->thermometer->calc(25.0);
        $this->assertEquals('快適', $result);
    }

    public function test28度の場合暑いが返ってくること(): void
    {
        $result = $this->thermometer->calc(28.0);
        $this->assertEquals('暑い', $result);
    }
}
