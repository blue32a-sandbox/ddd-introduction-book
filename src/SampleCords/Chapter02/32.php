<?php
// お金を乗算するふるまい
class Money
{
    public function __construct(
        private readonly int $amount,
        private readonly string $currency
    ) {
    }

    public function multiply(Rate $rate): Money
    {
        // ...
    }

    // public function multiply(Money $money) は定義されない
}
