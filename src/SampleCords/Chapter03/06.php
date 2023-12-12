<?php
// 比較手段の実装
class User implements Equatable
{
    private string $name;

    public function __construct(
        private readonly UserId $id,
        string $name
    ) {
        $this->changeUserName($name);
    }

    public function changeUserName(string $name)
    {
        if (strlen($name) < 3)
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');

        $this->name = $name;
    }

    #[\Override]
    public function equals($other): bool
    {
        if (! $other instanceof self) {
            return false;
        }
        return $this->id == $other->id;
    }
}
