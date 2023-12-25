<?php
// UserRepositoryはIUserRepositoryに依存する
interface IUserRepository
{
    public function find(UserId $id): ?User;
}

class UserRepository implements IUserRepository
{
    public function find(UserId $id): ?User
    {
        // ...
    }
}
