<?php
// ユーザ名を表す値オブジェクト
class UserName
{
    public function __construct(
        private readonly string $value
    )
    {
        if (strlen($value) < 3) {
            throw new InvalidArgumentException('ユーザ名は３文字異常です。');
        }
    }
}
