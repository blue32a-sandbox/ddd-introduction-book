<?php
// オーナーとメンバーが別管理になっている
class Circle
{
    public function __construct(
        // ...
        private User $owner,
        private array $members
    ) {
    }
}
