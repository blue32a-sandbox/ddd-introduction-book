<?php
// 値同士で比較する
$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');

$compareResult = $nameA->equals($nameB);
var_dump($compareResult);

$compareResult2 = $nameA == $nameB;
var_dump($compareResult2);

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
