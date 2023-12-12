<?php
// 同一性の診断をするために識別子を追加
class User
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
}
