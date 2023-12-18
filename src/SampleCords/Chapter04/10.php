<?php
// UserIdクラスとUserNameクラスの定義
class UserId
{
    public function __construct(
        public readonly string $value
    ) {
    }
}

class UserName
{
    public function __construct(
        public readonly string $value
    ) {
        if (strlen($value) < 3)
            throw new InvalidArgumentException('ユーザ名は３文字以上です。');
    }
}
