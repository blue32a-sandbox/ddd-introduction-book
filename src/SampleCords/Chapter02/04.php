<?php
// 氏名を表現するFullNameクラス
class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
