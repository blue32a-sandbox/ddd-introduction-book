<?php
// すべてのオブジェクトを再構築するメソッド
interface IUserRepository
{
    public function findAll(): array;

    // ...
}
