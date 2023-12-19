<?php
// Userクラスのリポジトリインターフェース
Interface IUserRepository
{
    public function save(User $user): void;
    public function find(UserName $name): ?User;
}
