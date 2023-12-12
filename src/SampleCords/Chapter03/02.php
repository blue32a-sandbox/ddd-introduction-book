<?php
// 可変なオブジェクトに変化させる
class User
{
    private string $name;

    public function __construct(string $name)
    {
        $this->changeName($name);
    }

    public function changeName(string $name)
    {
        if (strlen($name) < 3)
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');

        $this->name = $name;
    }
}
