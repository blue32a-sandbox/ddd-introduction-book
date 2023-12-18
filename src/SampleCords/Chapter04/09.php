<?php
// Userクラスの定義
class User
{
    public readonly UserId $id;

    public function __construct(public readonly UserName $user)
    {
        $this->id = new UserId((string) uniqid('', true));
    }
}
