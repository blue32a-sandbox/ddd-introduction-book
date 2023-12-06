<?php
// 加算した結果を受け取る
$myMoney = new Money(1000, 'JPY');
$allowance = new Money(3000, 'JPY');
$result = $myMoney->add($allowance);
