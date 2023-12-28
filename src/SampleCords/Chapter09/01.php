<?php
// ユーザの識別子はコンストラクタで生成される
class User
{
    public static function create(UserName $name)
    {
        $id = new UserId((string) uniqid('', true));
        return new self($id, $name);
    }

    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    // ...
}
