<?php
// 重複確認専用のインスタンスを用意する
$checkId = new UserId('check');
$checkName = new UserName('checker');
$checkObject = new User($checkId, $checkName);

$userId = new UserId('id');
$userName = new UserName('nrs');
$user = new User($userId, $userName);

// 重複確認専用インスタンスに問い合わせ
$duplicateCheckResult = $checkObject.exists($user);
var_dump($duplicateCheckResult);
