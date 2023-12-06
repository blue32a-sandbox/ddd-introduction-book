<?php
// 値オブジェクト同士の比較
$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');
var_dump($nameA->equals($nameB)); // PHPにequalsメソッドはない

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
