<?php
// 識別子によって検索されるメソッド
interface IUserRepocitory
{
    public function find(UserId $id): ?User;

    // ...
}
