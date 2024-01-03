<?php
// メンバーを追加するコードをエンティティに追加
class Circle
{
    public function __construct(
        private readonly CircleId $id,
        private User $owner,
        // メンバーは非公開にできる
        private array $members
    ) {
        // ...
    }

    // ...

    public function join(User $user): void
    {
        if (count($this->members) >= 29) {
            throw new CircleFullException($this->id);
        }

        $this->members[] = $user;
    }
}
