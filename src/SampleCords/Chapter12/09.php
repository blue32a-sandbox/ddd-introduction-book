<?php
// 上限数の変更
class Circle
{
    // ...

    public function isFull(): bool
    {
        // return count($this->members) >= 29;
        return count($this->members) >= 49;
    }
}
