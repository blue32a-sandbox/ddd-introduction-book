<?php
// 評価メソッドにまみれた定義
class Circle
{
    public function isFull(): bool {}
    public function isPopular(): bool {}
    public function isAnniversary(DateTime $today): bool {}
    public function isRecruition(): bool {}
    public function isLocked(): bool {}
    public function isPrivate(): bool {}
    public function join(User $user): void {}
}
