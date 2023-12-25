<?php
// 分離することで凝集度を高める
class HighCohesionA
{
    private int $value1;
    private int $value2;

    public function methodA(): int
    {
        return $this->value1 + $this->value2;
    }
}

class HighCohesionB
{
    private int $value3;
    private int $value4;

    public function methodB(): int
    {
        return $this->value3 + $this->value4;
    }
}
