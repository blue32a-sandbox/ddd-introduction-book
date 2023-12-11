<?php
// 単純な代入を行うコード
function createUser(string $name): User {
    $user = new User();
    $user->id = $name;
    return $user;
}
