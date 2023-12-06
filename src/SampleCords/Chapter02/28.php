<?php
// 金銭の加算処理を実装する
class Money
{
    public function __construct(
        private readonly int $amount,
        private readonly string $currency
    ) {
    }

    public function add(Money $arg): Money
    {
        if ($this->currency != $arg->currency) {
            throw new InvalidArgumentException(
                sprintf('通貨単位が異なります (this:%s, arg:%s)', $this->currency, $arg->currency)
            );
        }
        return new Money($this->amount + $arg->amount, $this->currency);
    }
}
