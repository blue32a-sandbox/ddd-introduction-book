<?php
// 新たな属性が追加されたときの修正
interface Equatable
{
    public function equals($other): bool;
}

class FullName implements Equatable
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName,
        readonly public string $middleName
    ) {
    }

    #[\Override]
    public function equals($other): bool
    {
        if (! $other instanceof self) {
            return false;
        }
        return $this->firstName === $other->firstName
            && $this->lastName === $other->lastName
            && $this->middleName === $other->middleName;
    }
}

$nameA = new FullName('masanobu', 'naruse', 'D');
$nameB = new FullName('masanobu', 'naruse', 'D');

$compareResult = $nameA->equals($nameB);
var_dump($compareResult);
