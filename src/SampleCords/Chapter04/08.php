<?php
// Userクラスにふるまいを定義する
class User
{
    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    public function changeUserName(UserName $name): void
    {
        $this->name = $name;
    }
}
