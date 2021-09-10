<?php

declare(strict_types=1);

namespace DecisionTable\Lib;

class Izakaya
{
    public function calcFirstBeerPrice(bool $isHappyHour, bool $isUseCoupon): int
    {
        if ($isUseCoupon) return 100;
        if ($isHappyHour) return 290;
        return 490;
    }
}
