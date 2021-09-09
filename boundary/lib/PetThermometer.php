<?php

declare(strict_types=1);

namespace Boundary\Lib;

class PetThermometer
{
    public function calc(float $temperature): string
    {
        if ($temperature < 24.0) return '寒い';
        if ($temperature < 26.0) return '快適';
        return '暑い';
    }
}
