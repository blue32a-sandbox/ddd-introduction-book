<?php
// 値オブジェクトの変更方法
$fullName = new FullName('masanobu', 'naruse');
$fullName = new FullName('masanobu', 'sato');

class FullName
{
    public function __construct(
        readonly public string $firstName,
        readonly public string $lastName
    ) {
    }
}
