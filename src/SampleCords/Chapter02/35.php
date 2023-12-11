<?php
// 製品番号を表す値オブジェクト
class ModelNumber
{
    public function __construct(
        private readonly string $productCode,
        private readonly string $branch,
        private readonly string $lot
    )
    {
    }

    #[\Override]
    public function __toString()
    {
        return $this->productCode . '-' . $this->branch . '-' . $this->lot;
    }
}
