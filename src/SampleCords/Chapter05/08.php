<?php
// リポジトリに重複確認を定義する場合
Interface IUserRepository
{
    // ...

    public function exists(UserName $name): bool;
}
