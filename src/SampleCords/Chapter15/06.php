<?php
// 別のオブジェクトとして定義する
namespace Core\Model\Users;

class User
{
    public function __construct(
        public readonly UserId $id,
        private UserName $name
    ) {
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }
}


namespace Authenticate\Model\Users;

class User
{
    public function __construct(
        public readonly UserId $id,
        private Password $password
    ) {
    }

    public function isSamePassword(Password $password): bool
    {
        return $this->password->equals($password);
    }
}
