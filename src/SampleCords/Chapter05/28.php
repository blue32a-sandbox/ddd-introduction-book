<?php
// 探索に適したメソッド
interface IUserRepocitory
{
    public function findByUserName(UserName $name): ?User;

    // オーバーロードがサポートされている言語の場合
    // public function find(UserName $name): ?User;

    // ...
}
