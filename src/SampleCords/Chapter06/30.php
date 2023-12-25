<?php
// 凝集度が低いクラス
class LowCohesion
{
    private int $value1;
    private int $value2;
    private int $value3;
    private int $value4;

    public function methodA(): int
    {
        return $this->value1 + $this->value2;
    }

    public function methodB(): int
    {
        return $this->value3 + $this->value4;
    }
}
