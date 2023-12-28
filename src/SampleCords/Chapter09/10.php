<?php
// リポジトリに採番処理を定義する
interface IUserRepository
{
    public function find(UserId $id): ?User;
    public function save(User $user): void;
    public function nextIdentity(): UserId;
}
