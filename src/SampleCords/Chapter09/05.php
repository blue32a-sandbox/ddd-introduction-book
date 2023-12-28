<?php
// Userクラスのcreateメソッドは不要になる
class User
{
    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    // ...
}
