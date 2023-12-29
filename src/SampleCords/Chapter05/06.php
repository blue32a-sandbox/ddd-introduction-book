<?php
// リポジトリに重複確認メソッドを追加した場合
Interface IUserRepository
{
    public function save(User $user): void;
    public function find(UserName $name): ?User;
    public function exists(User $user): bool;
}
