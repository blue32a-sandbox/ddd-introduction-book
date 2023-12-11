<?php
// 値オブジェクトを利用する
function createUser(UserName $name): User {
    $user = new User();
    $user->id = $name; // TypeError
    return $user;
}
