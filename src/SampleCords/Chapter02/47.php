<?php
// 値オブジェクトを利用した新規作成処理と更新処理
function createUser(string $name): void {
    $userName = new UserName($name);
    $user = new User($userName);

    // ...
}

function updateUser(string $id, string $name): void {
    $userName = new UserName($name);

    // ...
}
