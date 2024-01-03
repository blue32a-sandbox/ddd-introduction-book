<?php
// サークルのオーナーとメンバーの定義
class Circle
{
    public function __construct(
        private User $owner,
        private array $members
    ) {
        // ...
    }

    public function isFull(): bool
    {
        return $this->countMembers() >= 29;
    }

    public function countMembers(): int
    {
        return count($this->members) + 1;
    }
}
