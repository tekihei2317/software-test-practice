<?php

declare(strict_types=1);

namespace Boundary\Lib;

class KitchenScale
{
    /**
     * 測りで計測した重さを表示する
     */
    public function display(int $weight)
    {
        if (0 <= $weight && $weight <= 2000) return $weight;
        return 'EEEE';
    }
}
