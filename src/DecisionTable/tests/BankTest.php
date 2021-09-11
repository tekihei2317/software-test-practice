<?php

declare(strict_types=1);

use Carbon\Carbon;
use DecisionTable\Lib\Bank;
use PHPUnit\Framework\TestCase;
use DecisionTable\Lib\BankCustomer;

class BankTest extends TestCase
{
    private Bank $bank;
    private BankCustomer $customer;
    private BankCustomer $specialCustomer;

    protected function setUp(): void
    {
        $this->bank = new Bank();
        $this->customer = new BankCustomer();
        $this->specialCustomer = new BankCustomer(true);
    }

    public function test特別会員の場合、手数料が0円になること(): void
    {
        $fee = $this->bank->calcWithdrawalFee($this->specialCustomer, Carbon::now());
        $this->assertEquals($fee, 0);
    }

    public function test一般会員で平日の9時の場合、手数料が0円になること(): void
    {
        $date = Carbon::create(2021, 9, 10, 9, 0);
        $fee = $this->bank->calcWithdrawalFee($this->customer, $date);

        $this->assertEquals(true, $date->isWeekday());
        $this->assertEquals(0, $fee);
    }

    public function test一般会員で平日の20時の場合、手数料が110円になること(): void
    {
        $date = Carbon::create(2021, 9, 10, 20, 0);
        $fee = $this->bank->calcWithdrawalFee($this->customer, $date);

        $this->assertEquals(true, $date->isWeekday());
        $this->assertEquals(110, $fee);
    }

    public function test一般会員で土日の9時の場合、手数料が110円になること(): void
    {
        $date = Carbon::create(2021, 9, 11, 9, 0);
        $fee = $this->bank->calcWithdrawalFee($this->customer, $date);

        $this->assertEquals(true, $date->isWeekend());
        $this->assertEquals(110, $fee);
    }

    public function test一般会員で土日の20時の場合、手数料が110円になること(): void
    {
        $date = Carbon::create(2021, 9, 11, 20, 0);
        $fee = $this->bank->calcWithdrawalFee($this->customer, $date);

        $this->assertEquals(true, $date->isWeekend());
        $this->assertEquals(110, $fee);
    }
}
