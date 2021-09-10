<?php

declare(strict_types=1);

namespace DecisionTable\Tests;

use DecisionTable\Lib\Izakaya;
use PHPUnit\Framework\TestCase;

class IzakayaTest extends TestCase
{
    private Izakaya $izakaya;

    protected function setUp(): void
    {
        $this->izakaya = new Izakaya();
    }

    public function testハッピーアワーかつクーポン利用の場合、100円になること()
    {
        $price = $this->izakaya->calcFirstBeerPrice(true, true);
        $this->assertEquals(100, $price);
    }

    public function testハッピーアワーかつクーポンを利用しない場合、290円になること()
    {
        $price = $this->izakaya->calcFirstBeerPrice(true, false);
        $this->assertEquals(290, $price);
    }

    public function testハッピーアワーでないかつクーポン利用の場合、100円になること()
    {
        $price = $this->izakaya->calcFirstBeerPrice(false, true);
        $this->assertEquals(100, $price);
    }

    public function testハッピーアワーでないかつクーポンを利用しない場合、490円になること()
    {
        $price = $this->izakaya->calcFirstBeerPrice(false, false);
        $this->assertEquals(490, $price);
    }
}
