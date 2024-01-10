<?php
// ユーザ名を識別子とする
namespace Authenticate\Model\Users;

class User
{
    public function __construct(
        public readonly UaweName $id,
        private Password $password
    ) {
    }

    public function isSamePassword(Password $password): bool
    {
        return $this->password->equals($password);
    }
}
