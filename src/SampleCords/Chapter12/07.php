<?php
// デメテルの法則にしたがいオブジェクトにふるまいを追加する
class Circle
{
    public function __construct(
        private readonly CircleId $id,
        // メンバー一覧は非公開にできる
        private array $members
    ) {
        // ...
    }

    // ...

    public function isFull(): bool
    {
        return count($this->members) >= 29;
    }

    public function join(User $user): void
    {
        if ($this->isFull()) {
            throw new CircleFullException($this->id);
        }

        $this->members[] = $user;
    }
}
