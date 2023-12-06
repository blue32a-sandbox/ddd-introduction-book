<?php
// 属性を取り出して比較
$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');
$compareResult =
    $nameA->firstName == $nameB->firstName
    && $nameA->lastName == $nameB->lastName;
var_dump($compareResult); // true

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
