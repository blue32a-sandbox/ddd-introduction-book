<?php
// 輸送ドメインサービス
class TransportService
{
    public function transport(
        PhysicalDistributionBase $from,
        PhysicalDistributionBase $to,
        Baggage $baggage
    ): void {
        $shippedBaggage = $from->ship($baggage);
        $to->receive($shippedBaggage);

        // 配送の記録を行う
    }
}
