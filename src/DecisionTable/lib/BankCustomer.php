<?php

declare(strict_types=1);

namespace DecisionTable\Lib;

class BankCustomer
{
    private bool $isSpecial;

    public function __construct(bool $isSpecial = false)
    {
        $this->isSpecial = $isSpecial;
    }

    public function isSpecial(): bool
    {
        return $this->isSpecial;
    }
}
