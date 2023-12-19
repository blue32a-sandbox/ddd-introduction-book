<?php
// リスト4.4を利用して重複確認を行う
$userService = new UserService();

$userId = new UserId('id');
$userName = new UserName('naruse');
$user = new User($userId, $userName);

// ドメインサービスに問い合わせ
$duplicateCheckResult = $userService->exists($user);
var_dump($duplicateCheckResult);
