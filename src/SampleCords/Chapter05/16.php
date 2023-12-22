<?php
// 保存処理後にリポジトリの内部のインスタンスに影響してしまう

// ここでインスタンスをそのままリポジトリに保存してしまうと
$userRepository->save($user);
// インスタンスの操作がリポジトリに保存したインスタンスにまで影響する
$user->changeUserName(new UserName('naruse'));
