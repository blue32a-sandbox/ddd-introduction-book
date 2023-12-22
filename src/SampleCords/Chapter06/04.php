<?php
// ユーザのリポジトリ
interface IUserRepository
{
    public function find(UserId $id): ?User;
    public function findByName(UserName $name): ?User;
    public function save(User $user): void;
    public function delete(User $user): void;
}
