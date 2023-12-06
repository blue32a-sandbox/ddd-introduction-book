<?php
// 姓を表す値オブジェクト
class LastName
{
    public function __construct(
        readonly public string $value
    ) {
        if (strlen($value) === 0) {
            throw new InvalidArgumentException('１文字以上である必要があります。');
        }
    }
}
