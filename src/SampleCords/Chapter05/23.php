<?php
// 更新項目を引き渡す更新処理（悪い例）
interface IUserRepository
{
    public function updateName(UserId $id, UserName $name): void;

    // ...
}
