<?php
// ユーザ情報更新処理でも同様のコードを記述する
function updateUser(string $id, string $name) {
    if (strlen($name) < 3)
        throw new InvalidArgumentException('ユーザ名は３文字以上です。');

    // ...
}
