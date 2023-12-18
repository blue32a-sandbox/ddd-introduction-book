<?php
// 物流拠点に輸送のふるまいを定義する
class PhysicalDistributionBase
{
    // ...

    public function transport(self $to, Baggage $baggage): void
    {
        $shippedBaggage = $this->ship($baggage);
        $to->receive($shippedBaggage);

        // 例えば配送の記録
    }
}
