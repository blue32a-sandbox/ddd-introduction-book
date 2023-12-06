<?php
// 比較メソッドを提供するFullNameクラス
interface Equatable
{
    public function equals($other): bool;
}

class FullName implements Equatable
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }

    #[\Override]
    public function equals($other): bool
    {
        if (! $other instanceof self) {
            return false;
        }
        return $this->firstName === $other->firstName
            && $this->lastName === $other->lastName;
    }
}

$nameA = new FullName('masanobu', 'naruse');
$nameB = new FullName('masanobu', 'naruse');

$compareResult = $nameA->equals($nameB);
var_dump($compareResult);

// PHPでは、等価比較演算子でequalsは使用されない
// $compareResult2 = $nameA == $nameB;
// var_dump($compareResult2);

