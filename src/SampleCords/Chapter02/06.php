<?php
// 確実に姓を表示できる
$fullName = new FullName('john', 'smith');
echo $fullName->lastName . PHP_EOL;

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
