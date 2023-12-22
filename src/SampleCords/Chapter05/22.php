<?php
// 永続化を行うふるまい
interface IUserRepository
{
    public function save(User $user): void;

    // ...
}
