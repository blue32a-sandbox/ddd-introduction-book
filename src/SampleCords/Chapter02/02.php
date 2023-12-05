<?php
// 姓だけ表示する
$fullName = 'naruse masanobu';
$tokens = explode(' ', $fullName);
$lastName = $tokens[0];
echo $lastName . PHP_EOL;
