<?php
// ドメインサービスにユーザ名変更のふるまいを記述する
class UserService
{
    public function changeName(User $user, UserName $name): void
    {
        $user->name = $name;
    }
}
