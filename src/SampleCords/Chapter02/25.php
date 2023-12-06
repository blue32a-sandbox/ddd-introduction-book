<?php
// 名前を表現するクラス
class Name
{
    public function __construct(
        readonly public string $value
    ) {
        if (preg_match('/^[a-zA-z]+$/', $value) !== 1) {
            throw new InvalidArgumentException('許可されていない文字が使われています。');
        }
    }
}
