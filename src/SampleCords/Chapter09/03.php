<?php
// ファクトリのインターフェース
interface IUserFactory
{
    public function create(UserName $name): User;
}
