<?php
// FullNameクラスのlastNameプロパティを利用する
$fullName = new FullName('masanobu', 'naruse');
echo $fullName->lastName . PHP_EOL;

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
