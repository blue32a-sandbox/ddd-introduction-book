<?php
// 一般的に見られる値の変更
$fullName = new FullName('masanobu', 'naruse');
$fullName->changeLastName('sato');
echo $fullName->getLastName() . PHP_EOL;

class FullName
{
    public function __construct(
        private string $firstName,
        private string $lastName
    ) {
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function changeLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
}
