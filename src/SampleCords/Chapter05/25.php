<?php
// 履きを行うふるまいを定義したリポジトリ
interface IUserRepository
{
    public function delete(User $user): void;

    // ...
}
