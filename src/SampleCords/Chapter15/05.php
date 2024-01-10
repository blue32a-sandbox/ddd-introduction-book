<?php
// パスワードの認証ができるようにメソッドを追加する
class User
{
    public function __construct(
        public readonly UserId $id,
        private UserName $name,
        private Password $password
    ) {
    }

    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }

    public function isSamePassword(Password $password): bool
    {
        return $this->password->equals($password);
    }
}
