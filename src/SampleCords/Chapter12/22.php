<?php
// 30ではなく29が現れている
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
        return count($this->members) >= 29;
    }
}
