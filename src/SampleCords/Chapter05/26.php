<?php
// 識別子によって検索されるメソッド
interface IUserRepository
{
    public function find(UserId $id): ?User;

    // ...
}
