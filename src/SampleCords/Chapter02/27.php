<?php
// 量と通貨単位を属性にもつお金オブジェクト
class Money
{
    public function __construct(
        private readonly int $amount,
        private readonly string $currency
    ) {
    }
}
