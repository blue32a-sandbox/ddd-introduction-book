<?php
// 異なる通貨単位同士で加算は例外を送出する
$jpy = new Money(1000, 'JPY');
$usd = new Money(10, 'USD');
$result = $jpy->add($usd); // 例外が送出される
