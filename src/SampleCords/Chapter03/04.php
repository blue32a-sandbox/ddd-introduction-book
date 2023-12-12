<?php
// 識別子とそれを利用したユーザのオブジェクト
class UserId
{
    public function __construct(private string $value)
    {
    }
}

class User
{
    public function __construct(
        private readonly UserId $id,
        private string $name
    ) {
    }
}
