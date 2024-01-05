<?php
// 条件にしたがっているかを評価するふるまい
class Circle
{
    // ...

    public function isFull(): bool
    {
        return $this->countMembers() >= 30;
    }
}
