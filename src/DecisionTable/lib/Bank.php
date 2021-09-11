<?php

declare(strict_types=1);

namespace DecisionTable\Lib;

use Carbon\Carbon;

class Bank
{
    public function calcWithdrawalFee(BankCustomer $customer, Carbon $date): int
    {
        if ($customer->isSpecial()) {
            return 0;
        }
        if ($date->isWeekday() && $this->isBetweenFreeFeeHour($date)) {
            return 0;
        }
        return 110;
    }

    private function isBetweenFreeFeeHour(Carbon $date): bool
    {
        $startDate = clone $date;
        $endDate = clone $date;

        $startDate->hour = 8;
        $startDate->minute = 45;
        $startDate->second = 0;
        $endDate->hour = 18;
        $endDate->minute = 0;
        $endDate->second = 0;

        // $startDate <= $date < $endDate
        return $date->gte($startDate) && $date->lt($endDate);
    }
}
