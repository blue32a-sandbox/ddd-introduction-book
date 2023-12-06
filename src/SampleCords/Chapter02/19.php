<?php
// 新たに追加された属性も比較するように修正する
$nameA = new FullName('masanobu', 'naruse', 'D');
$nameB = new FullName('masanobu', 'naruse', 'D');

$compareResult =
    $nameA->firstName == $nameB->firstName
    && $nameA->lastName == $nameB->lastName
    && $nameA->middleName == $nameB->middleName;
var_dump($compareResult);

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName,
        readonly public string $middleName
    ) {
    }
}
