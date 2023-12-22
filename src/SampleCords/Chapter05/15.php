<?php
// オブジェクトの操作がリポジトリ内部のインスタンスに影響してしまう

// オブジェクトを再構築する際にディープコピーを行わないと
$user = $userRepository->find(new UserName('Naruse'));
// 次の操作がリポジトリ内部で保管されているインスタンスにまで影響する
$user->changeUserName(new UserName('naruse'));
