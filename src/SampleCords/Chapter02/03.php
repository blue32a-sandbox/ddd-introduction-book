<?php
// うまく姓を表示できないパターン
$fullName = 'john smith';
$tokens = explode(' ', $fullName);
$lastName = $tokens[0];
echo $lastName . PHP_EOL;
