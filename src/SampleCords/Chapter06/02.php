<?php
// Userクラスが利用している値オブジェクトの定義
class UserId
{
    public function __construct(public readonly string $value)
    {
        if ($value === "") {
            throw new InvalidArgumentException('valueが空文字です。');
        }
    }
}

class UserName
{
    public function __construct(public readonly string $value)
    {
        if (strlen($value) < 3) {
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');
        }
        if (strlen($value) > 20) {
            throw new InvalidArgumentException('ユーザ名は２０文字以下です。');
        }
    }
}
