<?php
// 永続化を行うふるまい
interface IUserRepocitory
{
    public function save(User $user): void;

    // ...
}
