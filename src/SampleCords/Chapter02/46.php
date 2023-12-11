<?php
// 値オブジェクトにルールをまとめる
class UserName
{
    public function __construct(
        private readonly string $value
    ) {
        if (strlen($value) < 3)
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');
    }
}
