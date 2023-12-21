<?php
// 履きを行うふるまいを定義したリポジトリ
interface IUserRepocitory
{
    public function delete(User $user): void;

    // ...
}
