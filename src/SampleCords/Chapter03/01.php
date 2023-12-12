<?php
// ユーザを表すクラス
class User
{
    public function __construct(private string $name)
    {
        if (strlen($name) < 3)
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');
    }
}
