<?php
// 入力値の確認を伴うユーザの作成処理
function createUser(string $name): void {
    if (strlen($name) < 3)
        throw new InvalidArgumentException('ユーザ名は３文字以上です。');

    $user = new User($name);
    // ...
}
