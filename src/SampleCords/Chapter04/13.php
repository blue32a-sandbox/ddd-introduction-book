<?php
// 物流拠点エンティティ
class PhysicalDistributionBase
{
    // ...

    public function ship(Baggage $baggage): Baggage
    {
        // ...
    }

    public function receive(Baggage $baggage): void
    {
        // ...
    }
}
