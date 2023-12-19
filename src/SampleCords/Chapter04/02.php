<?php
// リスト4.1を利用して重複確認を行う
$userId = new UserId('id');
$userName = new UserName('nrs');
$user = new User($userId, $userName);

// 生成したオブジェクト自身に問い合わせをすることになる
$duplicateCheckResult = $user->exists($user);
var_dump($duplicateCheckResult);
